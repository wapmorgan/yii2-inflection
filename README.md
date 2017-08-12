# yii2-inflection
Inflection _extension_ for Yii2. Support for English / Russian languages to inflect words / names / numbers / money / date&amp;time.

## Features
1. Pluralize word with number:
  - `en`: `Yii::$app->inflection->pluralize(2, 'item')` => `2 items`
  - `ru`: `Yii::$app->inflection->pluralize(2, 'элемент')` => `2 элемента`
  
2. Inflect names to relational cases (applicable in Russian only):
  - `ru`: `Yii::$app->inflection->inflectName('Иванов Петр', wapmorgan\yii2inflector\Inflector::DATIVE)` => `Иванову Петру`
  
  Description of all supported cases in Russian are desribed in **[Languages](#languages)** section.
  
3. Inflect geographical names to relational cases (application in Russian only):
  - `ru`: `Yii::$app->inflection->inflectGeoName('Санкт-Петербург', , wapmorgan\yii2inflector\Inflector::GENITIVE)` => `Санкт-Петербурга`
  
4. Generate cardinal numerals:
  - `en`: `Yii::$app->inflection->cardinalize(2)` => 'two'
  - `ru`: `Yii::$app->inflection->cardinalize(2)` => 'два'

5. Generate ordinal numerals:
  - `en`: `Yii::$app->inflection->cardinalize(2)` => '2nd'
  - `ru`: `Yii::$app->inflection->cardinalize(2)` => '2-й'
  
  And full form:
    - `en`: `Yii::$app->inflection->cardinalize(2, wapmorgan\yii2inflection\Inflector::FULL)` => 'second'
    - `ru`: `Yii::$app->inflection->cardinalize(2, wapmorgan\yii2inflection\Inflector::FULL)` => 'второй'

6. Money to words:
  - `en`: `Yii::$app->inflection->monetize(wapmorgan\yii2inflection\DOLLAR, 122.04)` => 'one hundred twenty-two dollars four cents'
  - `ru`: `Yii::$app->inflection->monetize(wapmorgan\yii2inflection\DOLLAR, 122.04)` => 'сто двадцать два доллара четыре цента'
  
7. Data range to words:
  - `ru`: `Yii::$app->inflection->textizeTimeRange(new DateInterval('P2Y'))` => '2 года'

## Installation
1. Install extension
  ```bash
  composer require wapmorgan/yii2-inflection
  ```
2. Add `wapmorgan\yii2inflection\Inflection` as a service `inflection` in config (**web.php** or **console.php**):
  ```php
  $config = [
    // ...
    // ...
    'components' => [
      // ...
      'inflection' => [
        'class' => 'wapmorgan\yii2inflection\Inflection'
      ]
    ],
    // ...
  ];
  ```
  Optional service parameters:
  - `language` - default language for inflection. Currently supported langs is `ru` (Russian) and `en` (English). If you passed unsupported or unknown language, an Exception will be throwed during service initializion. By default, it uses **language** parameter of current application.
3. Call any methods describing below in controllers / commands / views.
  ```php
  $word = 'новость';
  
  echo Yii::$app->inflection->pluralize(rand(2, 139), $word).PHP_EOL;
	echo Yii::$app->inflection->pluralize(rand(9, 69), $word).PHP_EOL;
  ```
