<?php
namespace wapmorgan\yii2inflection;


use DateInterval;
use morphos\Cases;

class RussianInflector implements Inflector
{

	public function pluralizeWord($word)
	{
		return \morphos\Russian\NounPluralization::getCase($word, Cases::NOMINATIVE);
	}

	public function pluralize($count, $word)
	{
		return \morphos\Russian\pluralize($word, $count);
	}

	public function inflectName($name, $case, $gender = null)
	{
		return \morphos\Russian\inflectName($name, $case, $gender);
	}

	public function inflectWord($word, $case)
	{
		return \morphos\Russian\NounDeclension::getCase($word, $case);
	}

	public function inflectGeoName($name, $case)
	{
		return \morphos\Russian\GeographicalNamesInflection::getCase($name, $case);
	}

	public function cardinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
	{
		return \morphos\Russian\CardinalNumeralGenerator::getCase($number, $case, $gender);
	}

	public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
	{
		return \morphos\Russian\OrdinalNumeralGenerator::getCase($number, $case, $gender);
	}

	public function monetize($currency, $value)
	{
		return \morphos\Russian\MoneySpeller::spell($value, $currency);
	}

	public function timeRangeTextize(DateInterval $interval)
	{
		return \morphos\Russian\TimeSpeller::spellInterval($interval);
	}
}
