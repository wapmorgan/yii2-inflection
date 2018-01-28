<?php
namespace wapmorgan\yii2inflection;

use DateInterval;
use Exception;
use morphos\Cases;
use morphos\Currency;
use morphos\Gender;

class RussianInflector extends Inflector
{
    protected static $casesMap = [
        Inflector::NOMINATIVE => Cases::NOMINATIVE,
        Inflector::ABLATIVE => Cases::ABLATIVE,
        Inflector::ACCUSATIVE => Cases::ACCUSATIVE,
        Inflector::DATIVE => Cases::DATIVE,
        Inflector::GENITIVE => Cases::GENETIVE,
        Inflector::PREPOSITIONAL => Cases::PREPOSITIONAL,
    ];

    protected static $gendersMap = [
        Inflector::MALE => Gender::MALE,
        Inflector::FEMALE => Gender::FEMALE,
    ];

    protected static $currenciesMap = [
        Inflector::DOLLAR => Currency::DOLLAR,
        Inflector::EURO => Currency::EURO,
        Inflector::YEN => Currency::YEN,
        Inflector::POUND => Currency::POUND,
        Inflector::FRANC => Currency::FRANC,
        Inflector::YUAN => Currency::YUAN,
        Inflector::KRONA => Currency::KRONA,
        Inflector::PESO => Currency::PESO,
        Inflector::WON => Currency::WON,
        Inflector::LIRA => Currency::LIRA,
        Inflector::RUBLE => Currency::RUBLE,
        Inflector::RUPEE => Currency::RUPEE,
        Inflector::REAL => Currency::REAL,
        Inflector::RAND => Currency::RAND,
        Inflector::HRYVNIA => Currency::HRYVNIA,
    ];

    public function pluralizeWord($word)
    {
        return \morphos\Russian\NounPluralization::getCase($word, Cases::NOMINATIVE);
    }

    public function pluralize($count, $word)
    {
        return \morphos\Russian\pluralize($count, $word);
    }

    public function inflectName($name, $case, $gender = null)
    {
        $case = static::transformCase($case);
        if ($gender !== null)
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

    public function cardinalize($number, $gender = self::MALE, $case = self::NOMINATIVE)
    {
        $case = static::transformCase($case);
        $gender = static::transformGender($gender);
        return \morphos\Russian\CardinalNumeralGenerator::getCase($number, $case, $gender);
    }

    public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
    {
        $case = static::transformCase($case);
        $gender = static::transformGender($gender);
        if ($form == self::FULL)
            return \morphos\Russian\OrdinalNumeralGenerator::getCase($number, $case, $gender);

        $ordinal = \morphos\Russian\OrdinalNumeralGenerator::getCase($number, $case, $gender);
        return $number.'-'.\morphos\S::last_position_for_one_of_chars($ordinal, \morphos\Russian\RussianLanguage::$consonants);
    }

    public function monetize($currency, $value)
    {
        $currency = static::transformCurrency($currency);
        return \morphos\Russian\MoneySpeller::spell($value, $currency);
    }

    public function textizeTimeRange(DateInterval $interval)
    {
        return \morphos\Russian\TimeSpeller::spellInterval($interval);
    }

    protected static function transformCase($case)
    {
        if (!isset(static::$casesMap[$case]))
            throw new Exception('Case "'.$case.'" is not supported by Russian language.');
        return static::$casesMap[$case];
    }

    protected static function transformGender($gender)
    {
        if (!isset(static::$gendersMap[$gender]))
            throw new Exception('Gender "'.$gender.'" is not supported by Russian language.');
        return static::$gendersMap[$gender];
    }

    protected static function transformCurrency($currency)
    {
        if (!isset(static::$currenciesMap[$currency]))
            throw new Exception('Currency "'.$currency.'" is not supported by Russian language.');
        return static::$currenciesMap[$currency];
    }
}
