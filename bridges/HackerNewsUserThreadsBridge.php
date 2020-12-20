<?php
class HackerNewsUserThreadsBridge extends BridgeAbstract {

	const MAINTAINER = 'rakoo';
	const NAME = 'Hacker News User Threads';
	const URI = 'https://news.ycombinator.com';
	const CACHE_TIMEOUT = 7200; // 2h
	const DESCRIPTION = 'Hacker News threads for a user (at https://news.ycombinator.com/threads?id=xxx)';
	const PARAMETERS = array( array(
		'user' => array(
			'name' => 'User',
			'type' => 'text',
			'required' => true,
			'title' => 'User whose threads you want to see'
		)
	));

	public function collectData(){
		$url = 'https://news.ycombinator.com/threads?id=' . $this->getInput('user');
		$html = getSimpleHTMLDOM($url) or returnServerError('Could not request HN.');
		Debug::log('queried ' . $url);
		Debug::log('found ' . $html);

		$item = array();
		$articles = $html->find('tr[class*="comtr"]');

		foreach ($articles as $element) {
			$id = $element->getAttribute('id');
			$item['uri'] = 'https://news.ycombinator.com/item?id=' . $id;
			$title = $element->find('span[class*="comhead"]', 0)->innertext;
			$item['title'] = $title;
			$item['timestamp'] = strtotime($element->find('span[class*="age"]', 0)->find('a', 0)->innertext);
			$item['content'] = $element->find('span[class*="commtext"]', 0)->innertext;

			$this->items[] = $item;
		}
	}
}
