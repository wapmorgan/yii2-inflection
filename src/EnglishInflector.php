<?php
namespace wapmorgan\yii2inflection;

use DateInterval;
use Exception;
use yii\helpers\Inflector as YiiInflector;

class EnglishInflector extends Inflector
{
    public function pluralizeWord($word)
    {
        return YiiInflector::pluralize($word);
    }

    public function pluralize($count, $word)
    {
        if ((int)$count === 1)
            return '1 '.$word;
        else
            return $count.' '.$this->pluralizeWord($word);
    }

    public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
    {
        return \morphos\English\OrdinalNumeralGenerator::generate($number, $form === self::SHORT);
    }

    public function monetize($currency, $value)
    {
        return $value;
    }

    public function textizeTimeRange(DateInterval $interval)
    {
        return \morphos\English\TimeSpeller::spellInterval($interval);
    }

    public function cardinalize($number, $gender = self::MALE, $case = self::NOMINATIVE)
    {
        return \morphos\English\CardinalNumeralGenerator::generate($number);
    }

    public function inflectGeoName($name, $case)
    {
        return $name;
    }

    public function inflectName($name, $case, $gender = null)
    {
        return $name;
    }

    public function inflectWord($word, $case)
    {
        return $word;
    }
}
