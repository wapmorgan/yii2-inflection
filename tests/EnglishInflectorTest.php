<?php
namespace wapmorgan\yii2infection\tests;

use wapmorgan\yii2inflection\Inflection;
use wapmorgan\yii2inflection\Inflector;

require __DIR__.'/../vendor/autoload.php';

class EnglishInflectorTest extends \PHPUnit_Framework_TestCase
{
	protected $inflection;

	public function setUp()
	{
		$this->inflector = new Inflection();
		$this->inflector->setLanguage('en');
		$this->inflector->init();
	}

	public function testPluralize()
	{
		$this->assertEquals('1 message', $this->inflector->pluralize(1, 'message'));
		$this->assertEquals('2 messages', $this->inflector->pluralize(2, 'message'));
	}

	public function testCardinalize()
	{
		$this->assertEquals('two', $this->inflector->cardinalize(2));
		$this->assertEquals('ten', $this->inflector->cardinalize(10));
		$this->assertEquals('three hundred fifty-six', $this->inflector->cardinalize(356));
	}

	public function testOrdinalize()
	{
		$this->assertEquals('2nd', $this->inflector->ordinalize(2));
		$this->assertEquals('tenth', $this->inflector->ordinalize(10, Inflector::FULL));
		$this->assertEquals('three hundred fifty-sixth', $this->inflector->ordinalize(356, Inflector::FULL));
	}

	public function testTextizeTimeRange()
	{
		$this->assertEquals('5 years', $this->inflector->textizeTimeRange(new \DateInterval('P5Y')));
	}
}
