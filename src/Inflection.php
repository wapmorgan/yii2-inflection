<?php
namespace wapmorgan\yii2inflection;

use DateInterval;
use Exception;
use InvalidArgumentException;
use Yii;
use yii\base\Component;

class Inflection extends Component
{
	/**
	 * Language used as main for inflection. If null, application's language property will be used.
	 * If application's language is not supported, it will fallback to English language.
	 * @var string
	 */
	protected $language;

	/**
	 * @var Inflector Instance of used inflector
	 */
	protected $inflector;

	/**
	 * @var array List of supported languages
	 */
	static protected $supportedLanguages = [
		'en',
		'ru',
	];

	public function init()
	{
		if (empty($this->language))
		{
			try {
				$this->setLanguage(Yii::$app->language);
			} catch (Exception $e) {
				$this->language = static::$supportedLanguages[0];
			}
		}
		switch ($this->language)
		{
			case 'en':
				$this->inflector = new EnglishInflector();
				break;
			case 'ru':
				$this->inflector = new RussianInflector();
				break;
		}
	}

	public function setLanguage($lang)
	{
		$lang = strtolower($lang);
		if (strpos($lang, '_') !== false)
			$lang = strstr($lang, '_', true);

		if (!in_array($lang, static::$supportedLanguages))
			throw new InvalidArgumentException('Language "'.$lang.'" is not supported for inflection. '.
				'All supported languages: ['.implode(', ', static::$supportedLanguages).']');

		$this->language = $lang;
	}

	/**
	 * @param integer|string $countOrWord
	 * @param null|string $word
	 */
	public function pluralize($countOrWord, $word = null)
	{
		if ($word === null)
			return $this->inflector->pluralizeWord($countOrWord);
		return $this->inflector->pluralize($countOrWord, $word);
	}

	/**
	 * @param string $name
	 * @param integer $case
	 * @param null|integer $gender
	 * @return string
	 */
	public function inflectName($name, $case, $gender = null)
	{
		if (!in_array($case, Inflector::getAllCases()))
			throw new InvalidArgumentException('Case "'.$case.'" is not supported.');
		return $this->inflector->inflectName($name, $case, $gender);
	}

	/**
	 * @param string $name
	 * @param integer $case
	 * @return string
	 */
	public function inflectGeoName($name, $case)
	{
		if (!in_array($case, Inflector::getAllCases()))
			throw new InvalidArgumentException('Case "'.$case.'" is not supported.');
		return $this->inflector->inflectName($name, $case);
	}

	/**
	 * @param integer $number
	 * @param integer $form
	 * @param integer $gender
	 * @param integer $case
	 * @return string
	 */
	public function cardinalize($number, $form = Inflector::SHORT, $gender = Inflector::MALE, $case = Inflector::NOMINATIVE)
	{
		if (!in_array($case, Inflector::getAllCases()))
			throw new InvalidArgumentException('Case "'.$case.'" is not supported.');
		return $this->inflector->cardinalize($number, $form, $gender, $case);
	}

	/**
	 * @param integer $number
	 * @param integer $form
	 * @param integer $gender
	 * @param integer $case
	 * @return string
	 */
	public function ordinalize($number, $form = Inflector::SHORT, $gender = Inflector::MALE, $case = Inflector::NOMINATIVE)
	{
		if (!in_array($case, Inflector::getAllCases()))
			throw new InvalidArgumentException('Case "'.$case.'" is not supported.');
		return $this->inflector->ordinalize($number, $form, $gender, $case);
	}

	/**
	 * @param integer $currency
	 * @param integer|float $value
	 * @return string
	 */
	public function monetize($currency, $value)
	{
		if (!in_array($currency, Inflector::getAllCurrencies()))
			throw new InvalidArgumentException('Currency "'.$currency.'" is not supported.');
		return $this->inflector->monetize($currency, $value);
	}

	/**
	 * @param DateInterval $interval
	 * @return string
	 */
	public function textizeTimeRange(DateInterval $interval)
	{
		return $this->inflector->textizeTimeRange($interval);
	}
}
