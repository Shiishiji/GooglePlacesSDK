<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class AddressComponent
{
    public readonly string $longName;
    public readonly string $shortName;
    public readonly array $types;

    public function __construct(string $longName, string $shortName, array $types)
    {
        $this->longName = $longName;
        $this->shortName = $shortName;
        $this->types = $types;
    }
}
