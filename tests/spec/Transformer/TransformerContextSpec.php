<?php

namespace spec\Shiishiji\GooglePlacesSDK\Transformer;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Location;
use Shiishiji\GooglePlacesSDK\Exception\TransformationNotPossibleException;
use Shiishiji\GooglePlacesSDK\Transformer\InputTransformerInterface;
use Shiishiji\GooglePlacesSDK\Transformer\TransformerContext;

class TransformerContextSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(TransformerContext::class);
    }

    public function let(InputTransformerInterface $inputTransformer): void
    {
        $this->beConstructedWith(
            [$inputTransformer],
        );
    }

    public function it_supports_every_type(): void
    {
        $this->supports(new \stdClass())->shouldBe(true);
    }

    public function it_throws_exception_when_cannot_transform_input(InputTransformerInterface $inputTransformer): void
    {
        $unknownInput = new \stdClass();

        $inputTransformer->supports($unknownInput)
            ->willReturn(false)
            ->shouldBeCalledOnce();

        $this
            ->shouldThrow(TransformationNotPossibleException::class)
            ->during('transform', [$unknownInput]);
    }

    public function it_transforms_input(InputTransformerInterface $inputTransformer): void
    {
        $input = new NearbySearchFilters(
            location: new Location(lat: 40, lng: -110),
            language: 'pl',
            radius: 4000,
        );

        $inputTransformer->supports($input)
            ->willReturn(true)
            ->shouldBeCalledOnce();

        $inputTransformer->transform($input)
            ->willReturn([
                'location' => '40,-110',
                'language' => 'pl',
                'radius' => 4000,
            ])
            ->shouldBeCalledOnce();

        $result = $this->transform($input);
        $result->shouldHaveKey('location');
        $result->shouldHaveKey('language');
        $result->shouldHaveKey('radius');
    }
}
