<?php
class EpicgamesBridge extends BridgeAbstract {

	const NAME = 'Epic Games Store News';
	const MAINTAINER = 'otakuf';
	const URI = 'https://www.epicgames.com';
	const DESCRIPTION = 'Returns the latest posts from epicgames.com';
	const CACHE_TIMEOUT = 3600; // 60min

	const PARAMETERS = array( array(
		'postcount' => array(
			'name' => 'Limit',
			'type' => 'list',
			'values' => array(
				'5' => 5,
				'10' => 10,
				'15' => 15,
				'20' => 20,
				'25' => 25,
			 ),
			'title' => 'Maximum number of items to return',
			'defaultValue' => 10,
		),
		'language' => array(
			'name' => 'Language',
			'type' => 'list',
			'values' => array(
				'English' => 'en',
				'العربية' => 'ar',
				'Deutsch' => 'de',
				'Español (Spain)' => 'es-ES',
				'Español (LA)' => 'es-MX',
				'Français' => 'fr',
				'Italiano' => 'it',
				'日本語' => 'ja',
				'한국어' => 'ko',
				'Polski' => 'pl',
				'Português (Brasil)' => 'pt-BR',
				'Русский' => 'ru',
				'ไทย' => 'th',
				'Türkçe' => 'tr',
				'简体中文' => 'zh-CN',
				'繁體中文' => 'zh-Hant',
			 ),
			'title' => 'Language of blog posts',
			'defaultValue' => 'en',
		),
	));

	public function collectData() {
		$api = 'https://store-content.ak.epicgames.com/api/';

		// Get sticky posts first
		// Example: https://store-content.ak.epicgames.com/api/ru/content/blog/sticky?locale=ru
		$urlSticky = $api . $this->getInput('language') . '/content/blog/sticky';
		// Then get posts
		// Example: https://store-content.ak.epicgames.com/api/ru/content/blog?limit=25
		$urlBlog = $api . $this->getInput('language') . '/content/blog?limit=' . $this->getInput('postcount');

		$dataSticky = getContents($urlSticky)
			or returnServerError('Unable to get the news pages from epicgames.com!');
		$dataBlog = getContents($urlBlog)
			or returnServerError('Unable to get the news pages from epicgames.com!');

		// Merge data
		$decodedData = array_merge(json_decode($dataSticky), json_decode($dataBlog));

		foreach($decodedData as $key => $value) {
			$item = array();
			$item['uri'] = self::URI . $value->url;
			$item['title'] = $value->title;
			$item['timestamp'] = $value->date;
			$item['author'] = 'Epic Games Store';
			if(!empty($value->author)) {
				$item['author'] = $value->author;
			}
			if(!empty($value->content)) {
				$item['content'] = defaultLinkTo($value->content, self::URI);
			}
			if(!empty($value->image)) {
				$item['enclosures'][] = $value->image;
			}
			$item['uid'] = $value->_id;
			$item['id'] = $value->_id;

			$this->items[] = $item;
		}

		// Sort data
		$this->orderItems();
		// Limit data
		$this->items = array_slice($this->items, 0, $this->getInput('postcount'));
	}

	// Order posts by date added
	private function orderItems() {
		$sort = array();

		foreach ($this->items as $key => $value) {
			$sort[$key] = $value['timestamp'];
		}

		array_multisort($sort, SORT_DESC, $this->items);
	}
}
