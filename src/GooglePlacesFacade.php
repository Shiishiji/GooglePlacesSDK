<?php

namespace Shiishiji\GooglePlacesSDK;

use Shiishiji\GooglePlacesSDK\Client\ClientFactoryInterface;
use Shiishiji\GooglePlacesSDK\Config\Configuration;
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Output\NearbySearchOutput;
use Shiishiji\GooglePlacesSDK\Transformer\InputTransformerInterface;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class GooglePlacesFacade
{
    public function __construct(
        private readonly Configuration $configuration,
        private readonly ClientFactoryInterface $clientFactory,
        private readonly InputTransformerInterface $inputTransformer,
        private readonly SerializerInterface $serializer = new Serializer(
            normalizers: [
                new ArrayDenormalizer(),
                new ObjectNormalizer(
                    nameConverter: new CamelCaseToSnakeCaseNameConverter(),
                    propertyTypeExtractor: new ReflectionExtractor(),
                ),
            ],
            encoders: [
                new JsonEncoder(),
            ],
        ),
    ) {
    }

    public function getNearbyPlaces(NearbySearchFilters $input): NearbySearchOutput
    {
        $client = $this->clientFactory->create([]);

        $response = $client->request('GET', 'nearbysearch/json', [
            'auth_bearer' => $this->configuration->authToken,
            'query' => array_merge(
                $this->inputTransformer->transform($input),
                [
                    'key' => $this->configuration->authToken,
                ]
            ),
        ]);

        return $this->serializer->deserialize($response->getContent(), NearbySearchOutput::class, 'json');
    }
}
