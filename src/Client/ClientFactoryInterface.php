<?php

namespace Shiishiji\GooglePlacesSDK\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

interface ClientFactoryInterface
{
    public function create(array $options): HttpClientInterface;
}
