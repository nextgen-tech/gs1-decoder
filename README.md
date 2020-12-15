# GS1-128 (EAN128) Decoder

Basic GS1-128 (EAN128) decoder in PHP.

## Installation

```sh
composer require nextgen-tech/gs1-decoder
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

| Identifier|      Title      | Description                                                                   |
|:---------:|-----------------|-------------------------------------------------------------------------------|
|     00    |       SSCC      | [Serial Shipping Container Code](https://www.gs1.org/standards/barcodes/application-identifiers/00?lang=en)                                                |
|     01    |       GTIN      | [Global Trade Item Number (GTIN)](https://www.gs1.org/standards/barcodes/application-identifiers/01?lang=en)                                               |
|     02    |     CONTENT     | [GTIN of contained trade items](https://www.gs1.org/standards/barcodes/application-identifiers/02?lang=en)                                                 |
|     10    |    BATCH/LOT    | [Batch or lot number](https://www.gs1.org/standards/barcodes/application-identifiers/10?lang=en)                                                           |
|     11    |    PROD DATE    | [Production date](https://www.gs1.org/standards/barcodes/application-identifiers/11?lang=en)                                                               |
|     12    |     DUE DATE    | [Due date](https://www.gs1.org/standards/barcodes/application-identifiers/12?lang=en)                                                                      |
|     13    |    PACK DATE    | [Packaging date](https://www.gs1.org/standards/barcodes/application-identifiers/13?lang=en)                                                                |
|     15    |   BEST BEFORE   | [Best before date](https://www.gs1.org/standards/barcodes/application-identifiers/15?lang=en)                                                              |
|     16    |     SELL BY     | [Sell by date](https://www.gs1.org/standards/barcodes/application-identifiers/16?lang=en)                                                                  |
|     17    |      USE BY     | [Expiration date](https://www.gs1.org/standards/barcodes/application-identifiers/17?lang=en)                                                               |
|     20    |     VARIANT     | [Internal product variant](https://www.gs1.org/standards/barcodes/application-identifiers/20?lang=en)                                                      |
|     21    |      SERIAL     | [Serial number](https://www.gs1.org/standards/barcodes/application-identifiers/21?lang=en)                                                                 |
|    422    |      ORIGIN     | [Country of origin of a trade item](https://www.gs1.org/standards/barcodes/application-identifiers/422?lang=en)                                             |
| 3100-3105 | NET WEIGHT (kg) | [Net weight, kilograms](https://www.gs1.org/standards/barcodes/application-identifiers/3100?lang=en)                                                         |
| 3920-3929 |      PRICE      | [Applicable amount payable, single monetary area (variable measure trade item)](https://www.gs1.org/standards/barcodes/application-identifiers/3920?lang=en) |
|    8005   |  PRICE PER UNIT | [Price per unit of measure](https://www.gs1.org/standards/barcodes/application-identifiers/8005?lang=en)                                                     |
|    8008   |    PROD TIME    | [Date and time of production](https://www.gs1.org/standards/barcodes/application-identifiers/8008?lang=en)                                                   |

The list of GS1 Application Identifiers can be found [here](https://www.gs1.org/standards/barcodes/application-identifiers)
