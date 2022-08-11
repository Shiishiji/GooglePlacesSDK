<?php

namespace Shiishiji\GooglePlacesSDK\Client;

use Shiishiji\GooglePlacesSDK\Config\Configuration;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class JsonClientFactory implements ClientFactoryInterface
{
    private const CLIENT_OPTIONS = [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];

    public function __construct(
        private readonly Configuration $configuration,
    ) {
    }

    public function create(array $options): HttpClientInterface
    {
        $clientOptions = $this->addHeaders($options);

        return HttpClient::createForBaseUri($this->configuration->baseUri, defaultOptions: $clientOptions);
    }

    private function addHeaders(array $options): array
    {
        return array_merge($options,
            self::CLIENT_OPTIONS,
            [
                'headers' => [
                    'User-Agent' => $this->configuration->userAgent,
                ],
            ],
        );
    }
}
