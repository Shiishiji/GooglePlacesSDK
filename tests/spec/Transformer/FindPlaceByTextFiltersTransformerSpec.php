<?php

namespace spec\Shiishiji\GooglePlacesSDK\Transformer;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\DTO\Input\FindPlaceByTextFilters;
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Input\Partials\Fields;
use Shiishiji\GooglePlacesSDK\DTO\Location;
use Shiishiji\GooglePlacesSDK\Transformer\FindPlaceByTextFiltersTransformer;

class FindPlaceByTextFiltersTransformerSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(FindPlaceByTextFiltersTransformer::class);
    }

    public function it_supports_correct_dto(): void
    {
        $this->supports(new \stdClass())->shouldBe(false);
        $this->supports(new NearbySearchFilters(new Location('20', '40'), 'pl'))->shouldBe(false);
        $this->supports(new FindPlaceByTextFilters(input: 'Museum of Contemporary Art Australia', inputType: 'textquery'))->shouldBe(true);
    }

    public function it_transforms_input(): void
    {
        $input = new FindPlaceByTextFilters(
            input: 'Museum of Contemporary Art Australia',
            inputType: 'textquery',
            fields: new Fields([Fields::FORMATTED_ADDRESS, Fields::PLACE_ID]),
            locationBias: 'ipbias',
            language: 'en',
        );

        $result = $this->transform($input);
        $result->shouldBeArray();
        $result->shouldHaveKey('input');
        $result->shouldHaveKey('inputtype');
        $result->shouldHaveKey('fields');
        $result->shouldHaveKey('locationbias');
        $result->shouldHaveKey('language');
    }
}
