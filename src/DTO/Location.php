<?php

namespace Shiishiji\GooglePlacesSDK\DTO;

class Location
{
    public function __construct(
        public readonly float|string $lat,
        public readonly float|string $lng,
    ) {
    }

    public function __toString(): string
    {
        return sprintf('%s,%s', $this->lat, $this->lng);
    }
}
