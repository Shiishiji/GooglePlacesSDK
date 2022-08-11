<?php

namespace spec\Shiishiji\GooglePlacesSDK\Client;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\Client\JsonClientFactory;
use Shiishiji\GooglePlacesSDK\Config\Configuration;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class JsonClientFactorySpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(JsonClientFactory::class);
    }

    public function let(): void
    {
        $this->beConstructedWith(
            new Configuration('token'),
        );
    }

    public function it_creates_client(): void
    {
        $this->create([])->shouldBeAnInstanceOf(HttpClientInterface::class);
    }
}
