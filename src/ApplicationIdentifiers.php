<?php
declare(strict_types=1);

namespace NGT\Barcode\GS1Decoder;

use NGT\Barcode\GS1Decoder\Contracts\Identifier as IdentifierContract;

class ApplicationIdentifiers
{
    /**
     * The list of available identifiers.
     *
     * @var  string[]
     */
    protected static $identifiers = [
        Identifiers\SSCCIdentifier::class,                       // 00
        Identifiers\GTINIdentifier::class,                       // 01
        Identifiers\ContentIdentifier::class,                    // 02
        Identifiers\BatchLotIdentifier::class,                   // 10
        Identifiers\ProductionDateIdentifier::class,             // 11
        Identifiers\DueDateIdentifier::class,                    // 12
        Identifiers\PackagingDateIdentifier::class,              // 13
        Identifiers\BestBeforeDateIdentifier::class,             // 15
        Identifiers\SellByDateIdentifier::class,                 // 16
        Identifiers\ExpirationDateIdentifier::class,             // 17
        Identifiers\VariantIdentifier::class,                    // 20
        Identifiers\SerialNumberIdentifier::class,               // 21
        Identifiers\CompanyInternalInformationIdentifier::class, // 91

        Identifiers\OriginIdentifier::class,                     // 422

        Identifiers\NetWeightKgIdentifier::class,                // 3100 - 3105
        Identifiers\PriceIdentifier::class,                      // 3920 - 3929
        Identifiers\PricePerUnitIdentifier::class,               // 8005
        Identifiers\ProductionTimeIdentifier::class,             // 8008
    ];

    /**
     * The list of cached instances of identifiers.
     *
     * @var  \NGT\Barcode\GS1Decoder\Contracts\Identifier[]
     */
    private static $cachedIdentifiers = [];

    /**
     * Initialize cached identifiers.
     *
     * @return  void
     */
    protected static function init(): void
    {
        foreach (static::$identifiers as $identifier) {
            /** @var \NGT\Barcode\GS1Decoder\Contracts\Identifier */
            $instance = new $identifier();

            self::$cachedIdentifiers[$instance->getCode()] = $instance;
        }
    }

    /**
     * Get the identifier instance.
     *
     * @param   string  $code
     * @return  \NGT\Barcode\GS1Decoder\Contracts\Identifier|null
     */
    public static function get(string $code): ?IdentifierContract
    {
        if (empty(static::$cachedIdentifiers)) {
            static::init();
        }

        if (array_key_exists($code, static::$cachedIdentifiers)) {
            return static::$cachedIdentifiers[$code]->copy();
        }

        return null;
    }
}
