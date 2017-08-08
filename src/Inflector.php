<?php
namespace wapmorgan\yii2inflection;

use DateInterval;

interface Inflector
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

	public function pluralizeWord($word);
	public function pluralize($count, $word);
	public function inflectName($name, $case, $gender = null);
	public function inflectGeoName($name, $case);
	public function inflectWord($word, $case);
	public function cardinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE);
	public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE);
	public function monetize($currency, $value);
	public function timeRangeTextize(DateInterval $interval);
}