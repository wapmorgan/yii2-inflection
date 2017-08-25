<?php
namespace wapmorgan\yii2inflection;

use DateInterval;

abstract class Inflector
{
	const SHORT = 1;
	const FULL = 2;

	const MALE = 1;
	const FEMALE = 2;

	const NOMINATIVE = 1;
	const ABLATIVE = 2;
	const AVERSIVE = 3;
	const BENEFACTIVE = 4;
	const CAUSAL = 5;
	const COMITATIVE = 6;
	const DATIVE = 7;
	const DISTRIBUTIVE = 8;
	const GENITIVE = 9;
	const ORNATIVE = 10;
	const POSSESSED = 11;
	const POSSESSIVE = 12;
	const PRIVATIVE = 13;
	const SEMBLATIVE = 14;
	const SOCIATIVE = 15;

	const DOLLAR = 1;
	const EURO = 2;
	const YEN = 3;
	const POUND = 4;
	const FRANC = 5;
	const YUAN = 6;
	const KRONA = 7;
	const PESO = 8;
	const WON = 9;
	const LIRA = 10;
	const RUBLE = 11;
	const RUPEE = 12;
	const REAL = 13;
	const RAND = 14;
	const HRYVNIA = 15;

	abstract public function pluralizeWord($word);
	abstract public function pluralize($count, $word);
	abstract public function inflectName($name, $case, $gender = null);
	abstract public function inflectGeoName($name, $case);
	abstract public function inflectWord($word, $case);
	abstract public function cardinalize($number, $gender = self::MALE, $case = self::NOMINATIVE);
	abstract public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE);
	abstract public function monetize($currency, $value);
	abstract public function textizeTimeRange(DateInterval $interval);

	/**
	 * @return array
	 */
	public static function getAllCurrencies()
	{
		return [
			static::DOLLAR,
			static::EURO,
			static::YEN,
			static::POUND,
			static::FRANC,
			static::YUAN,
			static::KRONA,
			static::PESO,
			static::WON,
			static::LIRA,
			static::RUBLE,
			static::RUPEE,
			static::REAL,
			static::RAND,
			static::HRYVNIA,
		];
	}

	/**
	 * @return array
	 */
	public static function getAllCases()
	{
		return [
			static::NOMINATIVE,
			static::ABLATIVE,
			static::AVERSIVE,
			static::BENEFACTIVE,
			static::CAUSAL,
			static::COMITATIVE,
			static::DATIVE,
			static::DISTRIBUTIVE,
			static::GENITIVE,
			static::ORNATIVE,
			static::POSSESSED,
			static::POSSESSIVE,
			static::PRIVATIVE,
			static::SEMBLATIVE,
			static::SOCIATIVE,
		];
	}
}