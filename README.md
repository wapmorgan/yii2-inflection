# yii2-inflection
Inflection _extension_ for Yii2. Support for English / Russian languages to inflect words / names / numbers / money / date&amp;time.

[![Latest Stable Version](https://poser.pugx.org/wapmorgan/yii2-inflection/v/stable)](https://packagist.org/packages/wapmorgan/yii2-inflection)
[![License](https://poser.pugx.org/wapmorgan/yii2-inflection/license)](https://packagist.org/packages/wapmorgan/yii2-inflection)
[![Testing](https://travis-ci.org/wapmorgan/yii2-inflection.svg)](https://travis-ci.org/wapmorgan/yii2-inflection)

1. [Features](#features)
    - [Cases](#cases)
    - [Currencies](#currencies)
2. [How does it work](#how-does-it-work)
3. [Installation](#installation)

## Features
1. **Pluralize word with number**:
  - `en`: `Yii::$app->inflection->pluralize(2, 'item')` => `2 items`
  - `ru`: `Yii::$app->inflection->pluralize(2, 'элемент')` => `2 элемента`

2. **Inflect names to relational cases (applicable in Russian only)**:
  - `ru`: `Yii::$app->inflection->inflectName('Иванов Петр', wapmorgan\yii2inflection\Inflector::DATIVE)` => `Иванову Петру`
  - _Description of all supported cases are in [Cases](#cases) section._

3. **Inflect geographical names to relational cases (applicable in Russian only)**:
  - `ru`: `Yii::$app->inflection->inflectGeoName('Санкт-Петербург', wapmorgan\yii2inflection\Inflector::GENITIVE)` => `Санкт-Петербурга`

4. **Generate cardinal numerals**:
  - `en`: `Yii::$app->inflection->cardinalize(2)` => 'two'
  - `ru`: `Yii::$app->inflection->cardinalize(2)` => 'два'

5. **Generate ordinal numerals**:
  - `en`: `Yii::$app->inflection->ordinalize(2)` => '2nd'
  - `ru`: `Yii::$app->inflection->ordinalize(2)` => '2-й'

  And full form:

  - `en`: `Yii::$app->inflection->ordinalize(2, wapmorgan\yii2inflection\Inflector::FULL)` => 'second'
  - `ru`: `Yii::$app->inflection->ordinalize(2, wapmorgan\yii2inflection\Inflector::FULL)` => 'второй'

6. **Money to words**:
  - (_WIP_) `en`: `Yii::$app->inflection->monetize(wapmorgan\yii2inflection\Inflector::DOLLAR, 122.04)` => 'one hundred twenty-two dollars four cents'
  - `ru`: `Yii::$app->inflection->monetize(wapmorgan\yii2inflection\Inflector::DOLLAR, 122.04)` => 'сто двадцать два доллара четыре цента'
  - _Description of all supported currencies are in [Currencies](#currencies) section._

7. **Data range to words**:
  - `en`: `Yii::$app->inflection->textizeTimeRange(new DateInterval('P2Y'))` => '2 years'
  - `ru`: `Yii::$app->inflection->textizeTimeRange(new DateInterval('P2Y'))` => '2 года'

_WIP_ means Work-in-progress i.e this feature is not supported now, but planned to be implemented.

### Cases

| Case                       | Russian      |
|----------------------------|--------------|
| `Inflector::NOMINATIVE`    | Именительный |
| `Inflector::ABLATIVE`      | Творительный |
| `Inflector::ACCUSATIVE`    | Винительный  |
| `Inflector::AVERSIVE`      |              |
| `Inflector::BENEFACTIVE`   |              |
| `Inflector::CAUSAL`        |              |
| `Inflector::COMITATIVE`    |              |
| `Inflector::DATIVE`        | Дательный    |
| `Inflector::DISTRIBUTIVE`  |              |
| `Inflector::GENITIVE`      | Родительный  |
| `Inflector::ORNATIVE`      |              |
| `Inflector::POSSESSED`     |              |
| `Inflector::POSSESSIVE`    |              |
| `Inflector::PREPOSITIONAL` | Предложный   |
| `Inflector::PRIVATIVE`     |              |
| `Inflector::SEMBLATIVE`    |              |
| `Inflector::SOCIATIVE`     |              |

### Currencies

| Currency             |
|----------------------|
| `Inflector::DOLLAR`  |
| `Inflector::EURO`    |
| `Inflector::YEN`     |
| `Inflector::POUND`   |
| `Inflector::FRANC`   |
| `Inflector::YUAN`    |
| `Inflector::KRONA`   |
| `Inflector::PESO`    |
| `Inflector::WON`     |
| `Inflector::LIRA`    |
| `Inflector::RUBLE`   |
| `Inflector::RUPEE`   |
| `Inflector::REAL`    |
| `Inflector::RAND`    |
| `Inflector::HRYVNIA` |

## How does it work
It uses built-in inflector for English pluralization (`yii\helpers\Inflector`) and [Morphos](https://github.com/wapmorgan/Morphos) for English & Russian on-the-fly inflection (without dictionaries).

## Installation
1. Install extension

  ```bash
  composer require wapmorgan/yii2-inflection
  ```

2. Add `wapmorgan\yii2inflection\Inflection` as a service `inflection` in config and specify proper target language of your application (**web.php** or **console.php**):

  ```php
  $config = [
    // ...
    'language' => 'ru_RU', // for example, Russian
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

  - Optional service parameters:
    - `language` - default language for inflection. By default, it uses **language** parameter of current application, but you can change this behavior. Currently supported langs is `ru` (Russian) and `en` (English) or their's modification (`ru_RU`, `en_US`). If you pass unsupported or unknown language, an Exception will be thrown during service initializion.
    - `defaultCurrency` - default currency when converting money to words. If set, you can call `monetize(float $value)` without currency: `Yii::$app->inflection->monetize(123.45)` => `сто двадцать три рубля сорок пять копеек`

3. Call any methods described above in a controller / command / view.

  ```php
  $word = 'новость';
  echo Yii::$app->inflection->pluralize(rand(2, 139), $word).PHP_EOL;
  echo Yii::$app->inflection->pluralize(rand(9, 69), $word).PHP_EOL;
  ```
