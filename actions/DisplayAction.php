<?php

/**
 * This file is part of RSS-Bridge, a PHP project capable of generating RSS and
 * Atom feeds for websites that don't have one.
 *
 * For the full license information, please view the UNLICENSE file distributed
 * with this source code.
 *
 * @package Core
 * @license http://unlicense.org/ UNLICENSE
 * @link    https://github.com/rss-bridge/rss-bridge
 */

class DisplayAction implements ActionInterface
{
    public $userData = [];

    private function getReturnCode($error)
    {
        $returnCode = $error->getCode();
        if ($returnCode === 301 || $returnCode === 302) {
            # Don't pass redirect codes to the exterior
            $returnCode = 508;
        }
        return $returnCode;
    }

    public function execute()
    {
        $bridge = array_key_exists('bridge', $this->userData) ? $this->userData['bridge'] : null;

        $format = $this->userData['format']
            or returnClientError('You must specify a format!');

        $bridgeFactory = new \BridgeFactory();

        // whitelist control
        if (!$bridgeFactory->isWhitelisted($bridge)) {
            throw new \Exception('This bridge is not whitelisted', 401);
            die;
        }

        // Data retrieval
        $bridge = $bridgeFactory->create($bridge);
        $bridge->loadConfiguration();

        $noproxy = array_key_exists('_noproxy', $this->userData)
            && filter_var($this->userData['_noproxy'], FILTER_VALIDATE_BOOLEAN);

        if (defined('PROXY_URL') && PROXY_BYBRIDGE && $noproxy) {
            define('NOPROXY', true);
        }

        // Cache timeout
        $cache_timeout = -1;
        if (array_key_exists('_cache_timeout', $this->userData)) {
            if (!CUSTOM_CACHE_TIMEOUT) {
                unset($this->userData['_cache_timeout']);
                $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . '?' . http_build_query($this->userData);
                header('Location: ' . $uri, true, 301);
                exit;
            }

            $cache_timeout = filter_var($this->userData['_cache_timeout'], FILTER_VALIDATE_INT);
        } else {
            $cache_timeout = $bridge->getCacheTimeout();
        }

        // Remove parameters that don't concern bridges
        $bridge_params = array_diff_key(
            $this->userData,
            array_fill_keys(
                [
                    'action',
                    'bridge',
                    'format',
                    '_noproxy',
                    '_cache_timeout',
                    '_error_time'
                ],
                ''
            )
        );

        // Remove parameters that don't concern caches
        $cache_params = array_diff_key(
            $this->userData,
            array_fill_keys(
                [
                    'action',
                    'format',
                    '_noproxy',
                    '_cache_timeout',
                    '_error_time'
                ],
                ''
            )
        );

        // Initialize cache
        $cacheFactory = new CacheFactory();

        $cache = $cacheFactory->create();
        $cache->setScope('');
        $cache->purgeCache(86400); // 24 hours
        $cache->setKey($cache_params);

        $items = [];
        $infos = [];
        $mtime = $cache->getTime();

        if (
            $mtime !== false
            && (time() - $cache_timeout < $mtime)
            && !Debug::isEnabled()
        ) { // Load cached data
            // Send "Not Modified" response if client supports it
            // Implementation based on https://stackoverflow.com/a/10847262
            if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
                $stime = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);

                if ($mtime <= $stime) { // Cached data is older or same
                    header('Last-Modified: ' . gmdate('D, d M Y H:i:s ', $mtime) . 'GMT', true, 304);
                    exit;
                }
            }

            $cached = $cache->loadData();

            if (isset($cached['items']) && isset($cached['extraInfos'])) {
                foreach ($cached['items'] as $item) {
                    $items[] = new \FeedItem($item);
                }

                $infos = $cached['extraInfos'];
            }
        } else { // Collect new data
            try {
                $bridge->setDatas($bridge_params);
                $bridge->collectData();

                $items = $bridge->getItems();

                // Transform "legacy" items to FeedItems if necessary.
                // Remove this code when support for "legacy" items ends!
                if (isset($items[0]) && is_array($items[0])) {
                    $feedItems = [];

                    foreach ($items as $item) {
                        $feedItems[] = new \FeedItem($item);
                    }

                    $items = $feedItems;
                }

                $infos = [
                    'name' => $bridge->getName(),
                    'uri'  => $bridge->getURI(),
                    'donationUri'  => $bridge->getDonationURI(),
                    'icon' => $bridge->getIcon()
                ];
            } catch (\Throwable $e) {
                error_log($e);

                if (logBridgeError($bridge::NAME, $e->getCode()) >= Configuration::getConfig('error', 'report_limit')) {
                    if (Configuration::getConfig('error', 'output') === 'feed') {
                        $item = new \FeedItem();

                        // Create "new" error message every 24 hours
                        $this->userData['_error_time'] = urlencode((int)(time() / 86400));

                        $message = sprintf(
                            'Bridge returned error %s! (%s)',
                            $e->getCode(),
                            $this->userData['_error_time']
                        );
                        $item->setTitle($message);

                        $item->setURI(
                            (isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '')
                            . '?'
                            . http_build_query($this->userData)
                        );

                        $item->setTimestamp(time());
                        $item->setContent(buildBridgeException($e, $bridge));

                        $items[] = $item;
                    } elseif (Configuration::getConfig('error', 'output') === 'http') {
                        header('Content-Type: text/html', true, $this->getReturnCode($e));
                        $response = buildTransformException($e, $bridge);
                        print $response;
                        exit;
                    }
                }
            }

            // Store data in cache
            $cache->saveData([
                'items' => array_map(function ($i) {
                    return $i->toArray();
                }, $items),
                'extraInfos' => $infos
            ]);
        }

        // Data transformation
        try {
            $formatFactory = new FormatFactory();
            $format = $formatFactory->create($format);
            $format->setItems($items);
            $format->setExtraInfos($infos);
            $lastModified = $cache->getTime();
            $format->setLastModified($lastModified);
            if ($lastModified) {
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s ', $lastModified) . 'GMT');
            }
            header('Content-Type: ' . $format->getMimeType() . '; charset=' . $format->getCharset());

            echo $format->stringify();
        } catch (\Throwable $e) {
            error_log($e);
            header('Content-Type: text/html', true, $e->getCode());
            $response = buildTransformException($e, $bridge);
            print $response;
            exit;
        }
    }
}
