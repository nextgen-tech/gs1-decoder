# GS1-128 (EAN128) Decoder

Basic GS1-128 (EAN128) decoder in PHP.

## Installation

```sh
composer require nextgen-tech/gs1-decoder
```

## Run Tests

```bash
# run PHPUnit tests
vendor/bin/phpunit

# run PHPStan analyse
vendor/bin/phpstan analyse
```

To run all tests automatically on several platforms you can use [act][act], which mimics GitHub Actions locally:

```bash
$ act -P ubuntu-latest=shivammathur/node:latest
```

## Usage

```php
use NGT\Barcode\GS1Decoder\Decoder;

$decoder = new Decoder($delimiter = '[FNC1]');
$barcode = $decoder->decode('0195012345678903422616[FNC1]3103000123');

print_r($barcode->toArray());
```

```
Array
(
    [value] => 0195012345678903422616[FNC1]3103000123
    [delimiter] => [FNC1]
    [identifiers] => Array
        (
            [01] => Array
                (
                    [code] => 01
                    [title] => GTIN
                    [name] => Global Trade Item Number
                    [length] => 14
                    [content] => 95012345678903
                    [raw_content] => 95012345678903
                )

            [422] => Array
                (
                    [code] => 422
                    [title] => ORIGIN
                    [name] => Country of origin of a trade item
                    [length] => 3
                    [content] => 616
                    [raw_content] => 616
                )

            [310] => Array
                (
                    [code] => 310
                    [title] => NET WEIGHT (kg)
                    [name] => Net weight, kilograms
                    [length] => 6
                    [content] => 0.123
                    [raw_content] => 000123
                    [decimals] => 3
                )

        )

)

```

## List of implemented identifiers

| Identifier|      Title      | Description                                                                              |
|:---------:|-----------------|------------------------------------------------------------------------------------------|
|     00    |       SSCC      | [Serial Shipping Container Code][AI-00]                                                  |
|     01    |       GTIN      | [Global Trade Item Number (GTIN)][AI-01]                                                 |
|     02    |     CONTENT     | [GTIN of contained trade items][AI-02]                                                   |
|     10    |    BATCH/LOT    | [Batch or lot number][AI-10]                                                             |
|     11    |    PROD DATE    | [Production date][AI-11]                                                                 |
|     12    |     DUE DATE    | [Due date][AI-12]                                                                        |
|     13    |    PACK DATE    | [Packaging date][AI-13]                                                                  |
|     15    |   BEST BEFORE   | [Best before date][AI-15]                                                                |
|     16    |     SELL BY     | [Sell by date][AI-16]                                                                    |
|     17    |      USE BY     | [Expiration date][AI-17]                                                                 |
|     20    |     VARIANT     | [Internal product variant][AI-20]                                                        |
|     21    |      SERIAL     | [Serial number][AI-21]                                                                   |
|     91    |     INTERNAL    | [Company internal information][AI-91]                                                    |
|    422    |      ORIGIN     | [Country of origin of a trade item][AI-422]                                              |
| 3100-3105 | NET WEIGHT (kg) | [Net weight, kilograms][AI-3100]                                                         |
| 3920-3929 |      PRICE      | [Applicable amount payable, single monetary area (variable measure trade item)][AI-3920] |
|    8005   |  PRICE PER UNIT | [Price per unit of measure][AI-8005]                                                     |
|    8008   |    PROD TIME    | [Date and time of production][AI-8008]                                                   |

The list of all GS1 Application Identifiers can be found [here](https://www.gs1.org/standards/barcodes/application-identifiers)

[act]: https://github.com/nektos/act
[AI-00]: https://www.gs1.org/standards/barcodes/application-identifiers/00?lang=en
[AI-01]: https://www.gs1.org/standards/barcodes/application-identifiers/01?lang=en
[AI-02]: https://www.gs1.org/standards/barcodes/application-identifiers/02?lang=en
[AI-10]: https://www.gs1.org/standards/barcodes/application-identifiers/10?lang=en
[AI-11]: https://www.gs1.org/standards/barcodes/application-identifiers/11?lang=en
[AI-12]: https://www.gs1.org/standards/barcodes/application-identifiers/12?lang=en
[AI-13]: https://www.gs1.org/standards/barcodes/application-identifiers/13?lang=en
[AI-15]: https://www.gs1.org/standards/barcodes/application-identifiers/15?lang=en
[AI-16]: https://www.gs1.org/standards/barcodes/application-identifiers/16?lang=en
[AI-17]: https://www.gs1.org/standards/barcodes/application-identifiers/17?lang=en
[AI-20]: https://www.gs1.org/standards/barcodes/application-identifiers/20?lang=en
[AI-21]: https://www.gs1.org/standards/barcodes/application-identifiers/21?lang=en
[AI-91]: https://www.gs1.org/standards/barcodes/application-identifiers/91?lang=en
[AI-422]: https://www.gs1.org/standards/barcodes/application-identifiers/422?lang=en
[AI-3100]: https://www.gs1.org/standards/barcodes/application-identifiers/3100?lang=en
[AI-3920]: https://www.gs1.org/standards/barcodes/application-identifiers/3920?lang=en
[AI-8005]: https://www.gs1.org/standards/barcodes/application-identifiers/8005?lang=en
[AI-8008]: https://www.gs1.org/standards/barcodes/application-identifiers/8008?lang=en
