<?php

namespace spec\Shiishiji\GooglePlacesSDK\Transformer;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Location;
use Shiishiji\GooglePlacesSDK\Transformer\NearbySearchFiltersTransformer;

class NearbySearchFiltersTransformerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(NearbySearchFiltersTransformer::class);
    }

    public function it_supports_correct_dto(): void
    {
        $this->supports(new \stdClass())->shouldBe(false);
        $this->supports(new NearbySearchFilters(new Location('20', '40'), 'pl'))->shouldBe(true);
    }

    public function it_transforms_input(): void
    {
        $input = new NearbySearchFilters(
            location: new Location('20', '40'),
            language: 'pl',
            keyword: 'keyword',
            maxPrice: 1000,
            minPrice: 100,
            name: 'name',
            openNow: false,
            rankBy: 'rankby',
            radius: 4000,
            type: 'type',
        );

        $result = $this->transform($input);
        $result->shouldBeArray();
        $result->shouldHaveKey('location');
        $result->shouldHaveKey('language');
        $result->shouldHaveKey('keyword');
        $result->shouldHaveKey('maxprice');
        $result->shouldHaveKey('minprice');
        $result->shouldHaveKey('name');
        $result->shouldHaveKey('opennow');
        $result->shouldHaveKey('rankby');
        $result->shouldHaveKey('radius');
        $result->shouldHaveKey('type');
    }
}
