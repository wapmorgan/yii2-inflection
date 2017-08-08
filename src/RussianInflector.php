<?php
namespace wapmorgan\yii2inflection;

use DateInterval;
use Exception;
use morphos\Cases;
use morphos\Gender;

class RussianInflector extends Inflector
{
	protected static $casesMap = [
		Inflector::NOMINATIVE => Cases::NOMINATIVE,
		Inflector::ABLATIVE => Cases::ABLATIVE,
    	Inflector::DATIVE => Cases::DATIVE,
    	Inflector::GENITIVE => Cases::GENETIVE,
	];

	protected static $gendersMap = [
		Inflector::MALE => Gender::MALE,
		Inflector::FEMALE => Gender::FEMALE,
	];

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
		$case = static::transformCase($case);
		$gender = static::transformGender($gender);
		return \morphos\Russian\inflectName($name, $case, $gender);
	}

	public function inflectWord($word, $case)
	{
		$case = static::transformCase($case);
		return \morphos\Russian\NounDeclension::getCase($word, $case);
	}

	public function inflectGeoName($name, $case)
	{
		$case = static::transformCase($case);
		return \morphos\Russian\GeographicalNamesInflection::getCase($name, $case);
	}

	public function cardinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
	{
		$case = static::transformCase($case);
		$gender = static::transformGender($gender);
		return \morphos\Russian\CardinalNumeralGenerator::getCase($number, $case, $gender);
	}

	public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
	{
		$case = static::transformCase($case);
		$gender = static::transformGender($gender);
		return \morphos\Russian\OrdinalNumeralGenerator::getCase($number, $case, $gender);
	}

	public function monetize($currency, $value)
	{
		return \morphos\Russian\MoneySpeller::spell($value, $currency);
	}

	public function textizeTimeRange(DateInterval $interval)
	{
		return \morphos\Russian\TimeSpeller::spellInterval($interval);
	}

	protected static function transformCase($case)
	{
		if (!isset(static::$casesMap[$case]))
			throw new Exception('Case "'.$case.'" is not supported.');
		return static::$casesMap[$case];
	}

	protected static function transformGender($gender)
	{
		if (!isset(static::$gendersMap[$gender]))
			throw new Exception('Gender "'.$gender.'" is not supported.');
		return static::$gendersMap[$gender];
	}
}
