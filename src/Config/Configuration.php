<?php

namespace Shiishiji\GooglePlacesSDK\Config;

class Configuration
{
    public function __construct(
        public readonly string $authToken,
        public readonly string $baseUri = 'https://maps.googleapis.com/maps/api/place/',
        public readonly string $userAgent = 'GooglePlacesSDK',
    ) {
    }
}
