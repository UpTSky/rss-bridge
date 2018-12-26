<?php
require_once __DIR__ . '/../lib/rssbridge.php';

use PHPUnit\Framework\TestCase;


class BridgeImplementationTest extends TestCase {
	const PATH_BRIDGES = __DIR__ . '/../bridges/';

	private $class;
	private $obj;


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testClassName($path) {
		$this->setBridge($path);
		$this->assertTrue($this->class === ucfirst($this->class), 'class name must start with uppercase character');
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testClassType($path) {
		$this->setBridge($path);
		$this->assertInstanceOf('BridgeAbstract', $this->obj);
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testConstants($path) {
		$this->setBridge($path);

		$this->assertInternalType('string', $this->obj::NAME, 'class::NAME');
		$this->assertNotEmpty($this->obj::NAME, 'class::NAME');
		$this->assertInternalType('string', $this->obj::URI, 'class::URI');
		$this->assertNotEmpty($this->obj::URI, 'class::URI');
		$this->assertInternalType('string', $this->obj::DESCRIPTION, 'class::DESCRIPTION');
		$this->assertNotEmpty($this->obj::DESCRIPTION, 'class::DESCRIPTION');
		$this->assertInternalType('string', $this->obj::MAINTAINER, 'class::MAINTAINER');
		$this->assertNotEmpty($this->obj::MAINTAINER, 'class::MAINTAINER');

		$this->assertInternalType('array', $this->obj::PARAMETERS, 'class::PARAMETERS');
		$this->assertInternalType('int', $this->obj::CACHE_TIMEOUT, 'class::CACHE_TIMEOUT');
		$this->assertGreaterThanOrEqual(0, $this->obj::CACHE_TIMEOUT, 'class::CACHE_TIMEOUT');
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testParameters($path) {
		$this->setBridge($path);

		$multiContexts = (count($this->obj::PARAMETERS) > 1);
		$paramsSeen = array();

		$allowedTypes = array(
			'text',
			'number',
			'list',
			'checkbox'
		);

		foreach($this->obj::PARAMETERS as $context => $params) {
			if ($multiContexts) {
				$this->assertInternalType('string', $context, 'invalid context name');
				$this->assertNotEmpty($context, 'empty context name');
			}

			foreach ($paramsSeen as $seen) {
				$this->assertNotEquals($seen, $params, 'same set of parameters not allowed');
			}
			$paramsSeen[] = $params;

			foreach ($params as $field => $options) {
				$this->assertInternalType('string', $field, $field.': invalid id');
				$this->assertNotEmpty($field, $field.':empty id');

				$this->assertInternalType('string', $options['name'], $field.': invalid name');
				$this->assertNotEmpty($options['name'], $field.': empty name');

				if (isset($options['type'])) {
					$this->assertInternalType('string', $options['type'], $field.': invalid type');
					$this->assertContains($options['type'], $allowedTypes, $field.': unknown type');

					if ($options['type'] == 'list') {
						$this->assertArrayHasKey('values', $options, $field.': missing list values');
						$this->assertInternalType('array', $options['values'], $field.': invalid list values');
						$this->assertNotEmpty($options['values'], $field.': empty list values');

						foreach ($options['values'] as $valueName => $value) {
							$this->assertInternalType('string', $valueName, $field.': invalid value name');
						}
					}
				}

				if (isset($options['required'])) {
					$this->assertInternalType('bool', $options['required'], $field.': invalid required');
				}

				if (isset($options['title'])) {
					$this->assertInternalType('string', $options['title'], $field.': invalid title');
					$this->assertNotEmpty($options['title'], $field.': empty title');
				}

				if (isset($options['pattern'])) {
					$this->assertInternalType('string', $options['pattern'], $field.': invalid pattern');
					$this->assertNotEmpty($options['pattern'], $field.': empty pattern');
				}

				if (isset($options['exampleValue'])) {
					$this->assertNotEmpty($options['exampleValue'], $field.': empty exampleValue');
				}

				if (isset($options['defaultValue'])) {
					$this->assertNotEmpty($options['defaultValue'], $field.': empty defaultValue');
				}
			}
		}

		$this->assertTrue(true);
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testVisibleMethods($path) {
		$allowedBridgeAbstract = get_class_methods('BridgeAbstract');
		sort($allowedBridgeAbstract);
		$allowedFeedExpander = get_class_methods('FeedExpander');
		sort($allowedFeedExpander);

		$this->setBridge($path);

		$methods = get_class_methods($this->obj);
		sort($methods);
		if ($this->obj instanceof FeedExpander) {
			$this->assertEquals($allowedFeedExpander, $methods);
		} else {
			$this->assertEquals($allowedBridgeAbstract, $methods);
		}
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testMethodValues($path) {
		$this->setBridge($path);

		$value = $this->obj->getDescription();
		$this->assertInternalType('string', $value, '$class->getDescription()');
		$this->assertNotEmpty($value, '$class->getDescription()');

		$value = $this->obj->getMaintainer();
		$this->assertInternalType('string', $value, '$class->getMaintainer()');
		$this->assertNotEmpty($value, '$class->getMaintainer()');

		$value = $this->obj->getName();
		$this->assertInternalType('string', $value, '$class->getName()');
		$this->assertNotEmpty($value, '$class->getName()');

		$value = $this->obj->getURI();
		$this->assertInternalType('string', $value, '$class->getURI()');
		$this->assertNotEmpty($value, '$class->getURI()');

		$value = $this->obj->getIcon();
		$this->assertInternalType('string', $value, '$class->getIcon()');
	}


	/**
	 * @dataProvider dataBridgesProvider
	 */
	public function testUri($path) {
		$this->setBridge($path);

		$this->checkUrl($this->obj::URI);
		$this->checkUrl($this->obj->getURI());
	}


	////////////////////////////////////////////////////////////////////////////


	public function dataBridgesProvider() {
		$bridges = array();
		foreach (glob(self::PATH_BRIDGES . '*Bridge.php') as $path) {
			$bridges[basename($path, '.php')] = array($path);
		}
		return $bridges;
	}


	private function setBridge($path) {
		require_once $path;
		$this->class = basename($path, '.php');
		$this->obj = new $this->class();
	}


	private function checkUrl($url) {
		$this->assertNotFalse(filter_var($url, FILTER_VALIDATE_URL), 'no valid URL');
		$this->assertContains('https://', $url);
	}
}
