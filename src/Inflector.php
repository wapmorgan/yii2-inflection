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
	const ACCUSATIVE = 3;
	const AVERSIVE = 4;
	const BENEFACTIVE = 5;
	const CAUSAL = 6;
	const COMITATIVE = 7;
	const DATIVE = 8;
	const DISTRIBUTIVE = 9;
	const GENITIVE = 10;
	const ORNATIVE = 11;
	const POSSESSED = 12;
	const POSSESSIVE = 13;
	const PREPOSITIONAL = 14;
	const PRIVATIVE = 15;
	const SEMBLATIVE = 16;
	const SOCIATIVE = 17;

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

    /**
     * @param string $word Pluralize passed noun
     * @return string
     */
    abstract public function pluralizeWord($word);

    /**
     * @param int $count Count of objects
     * @param string $word Noun
     * @return string
     */
    abstract public function pluralize($count, $word);


    /**
     * @param string $name Personal name
     * @param string $case Case to inflect to
     * @param null|int $gender Gender of person
     * @return string
     */
    abstract public function inflectName($name, $case, $gender = null);

    /**
     * @param string $name Name of geographical object
     * @param string $case Case to inflect to
     * @return string
     */
    abstract public function inflectGeoName($name, $case);

    /**
     * @param string $word Word to be inflected
     * @param string $case Case to inflect to
     * @return string
     */
    abstract public function inflectWord($word, $case);


    /**
     * @param int $number Count of objects
     * @param int $gender Gender of object
     * @param int $case Case to inflect to
     * @return string
     */
    abstract public function cardinalize($number, $gender = self::MALE, $case = self::NOMINATIVE);

    /**
     * @param int $number Count of objects
     * @param int $form Form of result
     * @param int $gender Gender of object
     * @param int $case   Case to inflect to
     * @return string
     */
    abstract public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE);

    /**
     * @param int $currency Currency
     * @param int|float|string $value Amount of money
     * @return string
     */
    abstract public function monetize($currency, $value);

    /**
     * @param \DateInterval $interval
     * @return string
     */
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
			static::ACCUSATIVE,
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
			static::PREPOSITIONAL,
			static::PRIVATIVE,
			static::SEMBLATIVE,
			static::SOCIATIVE,
		];
	}
}