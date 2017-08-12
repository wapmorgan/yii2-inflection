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
        if ($count === 1)
            return '1 '.$word;
        else
            return $count.' '.$this->pluralizeWord($word);
    }

    public function ordinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
    {
        return YiiInflector::ordinalize($number);
    }

    public function monetize($currency, $value)
    {
        // ...
    }

    public function textizeTimeRange(DateInterval $interval)
    {
        // ...
    }

    public function cardinalize($number, $form = self::SHORT, $gender = self::MALE, $case = self::NOMINATIVE)
	{
		// ...
	}

	public function inflectGeoName($name, $case)
	{
		// ...
	}

	public function inflectName($name, $case, $gender = null)
	{
		// ...
	}

	public function inflectWord($word, $case)
	{
		// ...
	}
}
