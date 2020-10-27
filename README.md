# GS1-128 (EAN128) Decoder

Basic GS1-128 (EAN128) decoder in PHP.

## Installation

```sh
composer install nextgen-tech/gs1-decoder
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

* 00 - Serial Shipping Container Code
* 01 - Global Trade Item Number (GTIN)
* 02 - GTIN of contained trade items
* 10 - Batch or lot number
* 11 - Production date
* 12 - Due date
* 13 - Packaging date
* 15 - Best before date
* 16 - Sell by date
* 17 - Expiration date
* 20 - Internal product variant
* 21 - Serial number
* 310 - Net weight, kilograms
* 422 - Country of origin of a trade item
* 8008 - Date and time of production
