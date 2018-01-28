<?php
namespace wapmorgan\yii2infection\tests;

use wapmorgan\yii2inflection\Inflection;
use wapmorgan\yii2inflection\Inflector;

require __DIR__.'/../vendor/autoload.php';

class RussianInflectorTest extends \PHPUnit_Framework_TestCase
{
	protected $inflection;

	public function setUp()
	{
		$this->inflector = new Inflection();
		$this->inflector->setLanguage('ru');
		$this->inflector->init();
	}

	public function testPluralize()
	{
		$this->assertEquals('1 сообщение', $this->inflector->pluralize(1, 'сообщение'));
		$this->assertEquals('2 сообщения', $this->inflector->pluralize(2, 'сообщение'));
		$this->assertEquals('5 сообщений', $this->inflector->pluralize(5, 'сообщение'));
	}

	public function testInflectName()
	{
		$this->assertEquals('Иванова Петра Викторовича', $this->inflector->inflectName('Иванов Петр Викторович', Inflector::GENITIVE));
        $this->assertEquals('Иванова Петра Викторовича', $this->inflector->inflectName('Иванов Петр Викторович', Inflector::ACCUSATIVE));
		$this->assertEquals('Иванову Петру Викторовичу', $this->inflector->inflectName('Иванов Петр Викторович', Inflector::DATIVE));
		$this->assertEquals('Ивановым Петром Викторовичем', $this->inflector->inflectName('Иванов Петр Викторович', Inflector::ABLATIVE));
        $this->assertEquals('Иванове Петре Викторовиче', $this->inflector->inflectName('Иванов Петр Викторович', Inflector::PREPOSITIONAL));
	}

	public function testInflectGeoName()
	{
		$this->assertEquals('Москвы', $this->inflector->inflectGeoName('Москва', Inflector::GENITIVE));
        $this->assertEquals('Москву', $this->inflector->inflectGeoName('Москву', Inflector::ACCUSATIVE));
		$this->assertEquals('Москве', $this->inflector->inflectGeoName('Москва', Inflector::DATIVE));
		$this->assertEquals('Москвой', $this->inflector->inflectGeoName('Москва', Inflector::ABLATIVE));
        $this->assertEquals('Москве', $this->inflector->inflectGeoName('Москва', Inflector::PREPOSITIONAL));
	}

	public function testCardinalize()
	{
		$this->assertEquals('два', $this->inflector->cardinalize(2));
		$this->assertEquals('десять', $this->inflector->cardinalize(10));
		$this->assertEquals('триста пятьдесят шесть', $this->inflector->cardinalize(356));
	}

	public function testOrdinalize()
	{
		$this->assertEquals('2-й', $this->inflector->ordinalize(2));
		$this->assertEquals('десятый', $this->inflector->ordinalize(10, Inflector::FULL));
		$this->assertEquals('триста пятьдесят шестая', $this->inflector->ordinalize(356, Inflector::FULL, Inflector::FEMALE));
	}

	public function testMonetize()
	{
		$this->assertEquals('десять долларов пять центов', $this->inflector->monetize(Inflector::DOLLAR, 10.05));
	}

	public function testTextizeTimeRange()
	{
		$this->assertEquals('5 лет', $this->inflector->textizeTimeRange(new \DateInterval('P5Y')));
	}
}
