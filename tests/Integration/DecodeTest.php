<?php

declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder\Test\Integration;

use DateTime;
use NGT\Barcode\GS1Decoder\Decoder;
use PHPUnit\Framework\TestCase;

class DecodeTest extends TestCase
{
    /**
     * @dataProvider getBarcodes
     *
     * @param string|bool $expectedContent
     */
    public function testCanDecode(
        string $barcode,
        string $identifier,
        string $expectedRawContent,
        $expectedContent = false
    ): void {
        $decoder        = new Decoder();
        $decodedBarcode = $decoder->decode($barcode);

        if (!$decodedBarcode->identifiers()->has($identifier)) {
            $this->fail(
                sprintf('Application Identifier %d was not extracted', $identifier)
            );
        }

        $this->assertEquals($expectedRawContent, $decodedBarcode->identifiers()->get($identifier)->getRawContent());

        if ($expectedContent !== false) {
            $this->assertEquals($expectedContent, $decodedBarcode->identifiers()->get($identifier)->getContent());
        }
    }

    public function getBarcodes(): array
    {
        return [
            'Serial Shipping Container Code' => [
                '003761234567000000110107638900343526',
                '00',
                '376123456700000011',
            ],
            'Global Trade Item Number (GTIN) []' => [
                '003761234567000000110107638900343526',
                '01',
                '07638900343526',
            ],
            'GTIN of contained trade items' => [
                '01076389003435260205410013108009',
                '02',
                '05410013108009',
            ],
            'Batch or lot number [Numeric]' => [
                '01006141410073491714123110458456[FNC1]211234',
                '10',
                '458456',
            ],
            'Batch or lot number [Alphanumeric 1]' => [
                '01006141410073491714123110A12345B[FNC1]211234',
                '10',
                'A12345B',
            ],
            'Batch or lot number [Alphanumeric 2]' => [
                '010061414199999610987654321GFEDCBA',
                '10',
                '987654321GFEDCBA',
            ],
            'Production date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '11',
                '201209',
                new DateTime('2020-12-09 23:59:59.999999'),
            ],
            'Due date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '12',
                '201216',
                new DateTime('2020-12-16 23:59:59.999999'),
            ],
            'Packaging date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '13',
                '201210',
                new DateTime('2020-12-10 23:59:59.999999'),
            ],
            'Best before date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '15',
                '201214',
                new DateTime('2020-12-14 23:59:59.999999'),
            ],
            'Sell by date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '16',
                '201213',
                new DateTime('2020-12-13 23:59:59.999999'),
            ],
            'Expiration date' => [
                '010871826513150711201209122012161320121015201214162012131720121539220288',
                '17',
                '201215',
                new DateTime('2020-12-15 23:59:59.999999'),
            ],
            'Internal product variant' => [
                '01076389003435262098',
                '20',
                '98',
            ],
            'Serial number [Numeric]' => [
                '01006141410073491714123110A12345B[FNC1]211234[FNC1]',
                '21',
                '1234',
            ],
            'Serial number [Alphanumeric]' => [
                '01006141410073491714123110A12345B[FNC1]211234ABC[FNC1]',
                '21',
                '1234ABC',
	    ],
	    'Consumer product variant' => [
		'01006141410073491714123110A12345B[FNC1]22ABC1234[FNC1]',
		'22',
		'ABC1234'
	    ],
	    'Variable count of items [Numeric]' => [
		'01006141410073491714123110A12345B[FNC1]300100[FNC1]',
		'30',
		'0100'
	    ],
            'Company internal information' => [
                '01087106420356209135[FNC1]',
                '91',
                '35',
            ],
            'Country of origin of a trade item' => [
                '0100614141007349422528[FNC1]',
                '422',
                '528',
            ],
            'Net weight, kilograms [no decimals]' => [
                '3100123456',
                '310',
                '123456',
                123456.0,
            ],
            'Net weight, kilograms [1 decimal] ' => [
                '3101123456',
                '310',
                '123456',
                12345.6,
            ],
            'Net weight, kilograms [2 decimals]' => [
                '3102123456',
                '310',
                '123456',
                1234.56,
            ],
            'Net weight, kilograms [3 decimals]' => [
                '3103123456',
                '310',
                '123456',
                123.456,
            ],
            'Net weight, kilograms [4 decimals]' => [
                '3104123456',
                '310',
                '123456',
                12.3456,
            ],
            'Net weight, kilograms [5 decimals]' => [
                '3105654321',
                '310',
                '654321',
                6.54321,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [no decimals]' => [
                '39201',
                '392',
                '1',
                1.0,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [1 decimal]' => [
                '3921123',
                '392',
                '123',
                12.3,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [2 decimals]' => [
                '39221234',
                '392',
                '1234',
                12.34,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [3 decimals]' => [
                '392312345',
                '392',
                '12345',
                12.345,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [4 decimals]' => [
                '3924123456',
                '392',
                '123456',
                12.3456,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [5 decimals]' => [
                '39251234567',
                '392',
                '1234567',
                12.34567,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [6 decimals]' => [
                '392612345678',
                '392',
                '12345678',
                12.345678,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [7 decimals]' => [
                '3927123456789',
                '392',
                '123456789',
                12.3456789,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [8 decimals]' => [
                '39281234567898',
                '392',
                '1234567898',
                12.34567898,
            ],
            'Applicable amount payable, single monetary area (variable measure trade item) [9 decimals]' => [
                '392912345678987',
                '392',
                '12345678987',
                12.345678987,
            ],
            'Price per unit of measure' => [
                '01076389003435268005003163',
                '8005',
                '003163',
                3163,
            ],
            'Date and time of production' => [
                '01076389003435268008201202141523',
                '8008',
                '201202141523',
                new DateTime('2020-12-02 14:15:23'),
            ],
            'Price [2 decimals] with GTIN' => [
                '3922123[FNC1]0110107638900343526',
                '392',
                '123',
                1.23,
            ],
        ];
    }
}
