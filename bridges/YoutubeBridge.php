<?php
/**
* RssBridgeYoutube
* Returns the newest videos
* WARNING: to parse big playlists (over ~90 videos), you need to edit simple_html_dom.php:
* change: define('MAX_FILE_SIZE', 600000);
* into:   define('MAX_FILE_SIZE', 900000);  (or more)
*/
class YoutubeBridge extends BridgeAbstract {

	const NAME = 'YouTube Bridge';
	const URI = 'https://www.youtube.com/';
	const CACHE_TIMEOUT = 10800; // 3h
	const DESCRIPTION = 'Returns the 10 newest videos by username/channel/playlist or search';
	const MAINTAINER = 'mitsukarenai';

	const PARAMETERS = array(
		'By username' => array(
			'u' => array(
				'name' => 'username',
				'exampleValue' => 'test',
				'required' => true
			)
		),
		'By channel id' => array(
			'c' => array(
				'name' => 'channel id',
				'exampleValue' => '15',
				'required' => true
			)
		),
		'By playlist Id' => array(
			'p' => array(
				'name' => 'playlist id',
				'exampleValue' => '15'
			)
		),
		'Search result' => array(
			's' => array(
				'name' => 'search keyword',
				'exampleValue' => 'test'
			),
			'pa' => array(
				'name' => 'page',
				'type' => 'number',
				'exampleValue' => 1
			)
		),
		'global' => array(
			'duration_min' => array(
				'name' => 'min. duration (minutes)',
				'type' => 'number',
				'title' => 'Minimum duration for the video in minutes',
				'exampleValue' => 5
			),
			'duration_max' => array(
				'name' => 'max. duration (minutes)',
				'type' => 'number',
				'title' => 'Maximum duration for the video in minutes',
				'exampleValue' => 10
			),
			'attach_format' => array(
				'name' => 'Attach videos to the feed as',
				'type' => 'list',
				'values' => array(
					'None' => '',
					'MP4 Video' => 'video/mp4',
					'WebM Video' => 'video/webm',
					'3GP Video' => 'video/3gpp',
					'FLV Video' => 'video/x-flv',
					'MP3 Audio' => 'audio/mp3',
					'MP4 Audio' => 'audio/mp4',
					'AAC Audio' => 'audio/aac',
					'Vorbis Audio' => 'audio/ogg',
					'Opus Audio' => 'audio/opus',
					'FLAC Audio' => 'audio/flac',
					'WAV Audio' => 'audio/wav'
				),
				'defaultValue' => '',
				'title' => 'Tries to download the video in the format specified. Needs youtube-dl installed. Audio formats also need ffmpeg installed.'
			),
		)
	);

	const FILE_TYPES = array(
		'video/mp4' => 'mp4',
		'video/webm' => 'webm',
		'video/3gpp' => '3gp',
		'video/x-flv' => 'flv',
		'audio/mp3' => 'mp3',
		'audio/mp4' => 'm4a',
		'audio/aac' => 'aac',
		'audio/ogg' => array('extension' => 'ogg', 'format' => 'vorbis'),
		'audio/opus' => 'opus',
		'audio/flac' => 'flac',
		'audio/wav' => 'wav',
	);

	private $feedName = '';

	private function ytBridgeQueryVideoInfo($vid, &$author, &$desc, &$time){
		$html = $this->ytGetSimpleHTMLDOM(self::URI . "watch?v=$vid", true);

		// Skip unavailable videos
		if(!strpos($html->innertext, 'IS_UNAVAILABLE_PAGE')) {
			return;
		}

		foreach($html->find('script') as $script) {
			$data = trim($script->innertext);

			if(strpos($data, '{') !== 0)
				continue; // Wrong script

			$json = json_decode($data);

			if(!isset($json->itemListElement))
				continue; // Wrong script

			$author = $json->itemListElement[0]->item->name;
		}

		if(!is_null($html->find('#watch-description-text', 0)))
			$desc = $html->find('#watch-description-text', 0)->innertext;

		if(!is_null($html->find('meta[itemprop=datePublished]', 0)))
			$time = strtotime($html->find('meta[itemprop=datePublished]', 0)->getAttribute('content'));
	}

	private function ytBridgeAddItem($vid, $title, $author, $desc, $time){
		$item = array();
		$item['id'] = $vid;
		$item['title'] = $title;
		$item['author'] = $author;
		$item['timestamp'] = $time;
		$item['uri'] = self::URI . 'watch?v=' . $vid;
		$thumbnailUri = str_replace('/www.', '/img.', self::URI) . 'vi/' . $vid . '/0.jpg';
		$item['content'] = '<a href="' . $item['uri'] . '"><img src="' . $thumbnailUri . '" /></a><br />' . $desc;
		$this->ytBridgeAttachVideo($vid, $item);
		$this->items[] = $item;
	}

	private function ytBridgeAttachVideo($vid, &$item) {
		$attach_format = $this->getInput('attach_format');

		if(empty($attach_format)) {
			return;
		}
		$path = $this->ytBridgeDownloadVideo($vid, $attach_format);
		if($path === null) {
			return;
		}

		$path = realpath($path);
		$mainDir = realpath(PATH_ROOT);

		if(strpos($path, $mainDir) !== 0) {
			error_log("Downloaded video in $path is not inside $mainDir");
			return;
		}

		$urlPrefix = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
		$urlHost = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '';

		// FIXME: Make base URL configurable instead of relying on host header and server vars
		$url = $urlPrefix . $urlHost . substr($path, strlen($mainDir));

		$item['enclosures'] = array(
			array('url' => $url, 'mime_type' => $attach_format, 'length' => filesize($path))
		);
	}

	/**
	 * Downloads the video for the given id/format and returns the path it was saved to or null if it could not be saved.
	 * 
	 * @param string $vid the YouTube video ID
	 * @param string $format the desired format of the downloaded.
	 * 
	 * @return string the path to the downloaded file (on disk)
	 */
	private function ytBridgeDownloadVideo($vid, $mime_type) {
		$cacheFac = new CacheFactory();
		$cacheFac->setWorkingDir(PATH_LIB_CACHES);
		// Needs to be a file cache because it needs to be servable by apache
		$cache = $cacheFac->create('file');
		$cache->setScope('youtube-dl');
		$cache->purgeCache(15 * 24 * 60 * 60); // 15 days
		$fileType = self::FILE_TYPES[$mime_type];
		if(is_string($fileType)) {
			$fileType = array('extension' => $fileType, 'format' => $fileType);
		}
		extract($fileType);
		$path = $cache->getPath() . "$vid.$extension";
		if(file_exists($path)) {
			// File was downloaded already
			if(filesize($path) === 0) {
				// Previous download failed, do not try again
				return null;
			}
			// Mark the file as fresh so the cache doesn’t delete it
			touch($path);
			return $path;
		}
		$isAudio = strpos($mime_type, 'audio/') === 0;
		$args = array(
			'--output',
			$cache->getPath() . '%(id)s.%(ext)s',
			'--no-mtime'
		);
		if($isAudio) {
			$args[] = '--extract-audio';
			$args[] = '--audio-format';
		} else {
			$args[] = '--format';
		}
		$args[] = $format;
		$args[] = $vid;
		$command = escapeshellcmd('youtube-dl') . ' '
			. implode(' ', array_map('escapeshellarg', $args)) . ' '
			. '2>&1'; // Catch error messages in stdout
		exec(
			$command,
			$output,
			$returnValue
		);
		if($returnValue !== 0) {
			error_log("Downloading the YouTube video $vid using $command failed: " . implode("\n", $output));
			// Create an empty file to signify that the download need not be re-tried
			touch($path);
			return null;
		} else if(Debug::isEnabled()) {
			error_log("youtube-dl command $command for video $vid finished with: " . implode("\n", $output));
		}

		return $path;
	}

	private function ytBridgeParseXmlFeed($xml) {
		foreach($xml->find('entry') as $element) {
			$title = $this->ytBridgeFixTitle($element->find('title', 0)->plaintext);
			$author = $element->find('name', 0)->plaintext;
			$desc = $element->find('media:description', 0)->innertext;

			// Make sure the description is easy on the eye :)
			$desc = htmlspecialchars($desc);
			$desc = nl2br($desc);
			$desc = preg_replace('/(http[s]{0,1}\:\/\/[a-zA-Z0-9.\/\?\&=\-_]{4,})/ims',
				'<a href="$1" target="_blank">$1</a> ',
				$desc);

			$vid = str_replace('yt:video:', '', $element->find('id', 0)->plaintext);
			$time = strtotime($element->find('published', 0)->plaintext);
			if(strpos($vid, 'googleads') === false)
				$this->ytBridgeAddItem($vid, $title, $author, $desc, $time);
		}
		$this->feedName = $this->ytBridgeFixTitle($xml->find('feed > title', 0)->plaintext);  // feedName will be used by getName()
	}

	private function ytBridgeParseHtmlListing($html, $element_selector, $title_selector, $add_parsed_items = true) {
		$count = 0;

		$duration_min = $this->getInput('duration_min') ?: -1;
		$duration_min = $duration_min * 60;

		$duration_max = $this->getInput('duration_max') ?: INF;
		$duration_max = $duration_max * 60;

		if($duration_max < $duration_min) {
			returnClientError('Max duration must be greater than min duration!');
		}

		foreach($html->find($element_selector) as $element) {
			$author = '';
			$desc = '';
			$time = 0;
			$vid = str_replace('/watch?v=', '', $element->find('a', 0)->href);
			$vid = substr($vid, 0, strpos($vid, '&') ?: strlen($vid));
			$title = trim($this->ytBridgeFixTitle($element->find($title_selector, 0)->plaintext));

			if (strpos($vid, 'googleads') !== false
				|| $title == '[Private video]'
				|| $title == '[Deleted video]'
			) {
				continue;
			}

			// The duration comes in one of the formats:
			// hh:mm:ss / mm:ss / m:ss
			// 01:03:30 / 15:06 / 1:24
			$durationText = trim($element->find('div.timestamp span', 0)->plaintext);
			$durationText = preg_replace('/([\d]{1,2})\:([\d]{2})/', '00:$1:$2', $durationText);

			sscanf($durationText, '%d:%d:%d', $hours, $minutes, $seconds);
			$duration = $hours * 3600 + $minutes * 60 + $seconds;

			if($duration < $duration_min || $duration > $duration_max) {
				continue;
			}

			if ($add_parsed_items) {
				$this->ytBridgeQueryVideoInfo($vid, $author, $desc, $time);
				$this->ytBridgeAddItem($vid, $title, $author, $desc, $time);
			}
			$count++;
		}
		return $count;
	}

	private function ytBridgeFixTitle($title) {
		// convert both &#1234; and &quot; to UTF-8
		return html_entity_decode($title, ENT_QUOTES, 'UTF-8');
	}

	private function ytGetSimpleHTMLDOM($url, $cached = false){
		$header = array(
			'Accept-Language: en-US'
		);
		$opts = array();
		$lowercase = true;
		$forceTagsClosed = true;
		$target_charset = DEFAULT_TARGET_CHARSET;
		$stripRN = false;
		$defaultBRText = DEFAULT_BR_TEXT;
		$defaultSpanText = DEFAULT_SPAN_TEXT;
		if ($cached) {
			return getSimpleHTMLDOMCached($url,
				86400,
				$header,
				$opts,
				$lowercase,
				$forceTagsClosed,
				$target_charset,
				$stripRN,
				$defaultBRText,
				$defaultSpanText);
		}
		return getSimpleHTMLDOM($url,
			$header,
			$opts,
			$lowercase,
			$forceTagsClosed,
			$target_charset,
			$stripRN,
			$defaultBRText,
			$defaultSpanText);
	}

	public function collectData(){

		$xml = '';
		$html = '';
		$url_feed = '';
		$url_listing = '';

		if($this->getInput('u')) { /* User and Channel modes */
			$this->request = $this->getInput('u');
			$url_feed = self::URI . 'feeds/videos.xml?user=' . urlencode($this->request);
			$url_listing = self::URI . 'user/' . urlencode($this->request) . '/videos';
		} elseif($this->getInput('c')) {
			$this->request = $this->getInput('c');
			$url_feed = self::URI . 'feeds/videos.xml?channel_id=' . urlencode($this->request);
			$url_listing = self::URI . 'channel/' . urlencode($this->request) . '/videos';
		}

		if(!empty($url_feed) && !empty($url_listing)) {
			if(!$this->skipFeeds() && $xml = $this->ytGetSimpleHTMLDOM($url_feed)) {
				$this->ytBridgeParseXmlFeed($xml);
			} elseif($html = $this->ytGetSimpleHTMLDOM($url_listing)) {
				$this->ytBridgeParseHtmlListing($html, 'li.channels-content-item', 'h3');
			} else {
				returnServerError("Could not request YouTube. Tried:\n - $url_feed\n - $url_listing");
			}
		} elseif($this->getInput('p')) { /* playlist mode */
			$this->request = $this->getInput('p');
			$url_feed = self::URI . 'feeds/videos.xml?playlist_id=' . urlencode($this->request);
			$url_listing = self::URI . 'playlist?list=' . urlencode($this->request);
			$html = $this->ytGetSimpleHTMLDOM($url_listing)
				or returnServerError("Could not request YouTube. Tried:\n - $url_listing");
			$item_count = $this->ytBridgeParseHtmlListing($html, 'tr.pl-video', '.pl-video-title a', false);
			if ($item_count <= 15 && !$this->skipFeeds() && ($xml = $this->ytGetSimpleHTMLDOM($url_feed))) {
				$this->ytBridgeParseXmlFeed($xml);
			} else {
				$this->ytBridgeParseHtmlListing($html, 'tr.pl-video', '.pl-video-title a');
			}
			$this->feedName = 'Playlist: ' . str_replace(' - YouTube', '', $html->find('title', 0)->plaintext); // feedName will be used by getName()
			usort($this->items, function ($item1, $item2) {
				return $item2['timestamp'] - $item1['timestamp'];
			});
		} elseif($this->getInput('s')) { /* search mode */
			$this->request = $this->getInput('s');
			$page = 1;
			if($this->getInput('pa'))
				$page = (int)preg_replace('/[^0-9]/', '', $this->getInput('pa'));

			$url_listing = self::URI
			. 'results?search_query='
			. urlencode($this->request)
			. '&page='
			. $page
			. '&filters=video&search_sort=video_date_uploaded';

			$html = $this->ytGetSimpleHTMLDOM($url_listing)
				or returnServerError("Could not request YouTube. Tried:\n - $url_listing");

			$this->ytBridgeParseHtmlListing($html, 'div.yt-lockup', 'h3 > a');
			$this->feedName = 'Search: ' . str_replace(' - YouTube', '', $html->find('title', 0)->plaintext); // feedName will be used by getName()
		} else { /* no valid mode */
			returnClientError("You must either specify either:\n - YouTube
 username (?u=...)\n - Channel id (?c=...)\n - Playlist id (?p=...)\n - Search (?s=...)");
		}
	}

	private function skipFeeds() {
		return ($this->getInput('duration_min') || $this->getInput('duration_max'));
	}

	public function getName(){
	  // Name depends on queriedContext:
		switch($this->queriedContext) {
		case 'By username':
		case 'By channel id':
		case 'By playlist Id':
		case 'Search result':
			return $this->feedName . ' - YouTube'; // We already know it's a bridge, right?
		default:
			return parent::getName();
		}
	}
}
