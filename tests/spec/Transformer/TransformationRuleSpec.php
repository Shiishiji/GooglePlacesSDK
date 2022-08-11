<?php

namespace spec\Shiishiji\GooglePlacesSDK\Transformer;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\Transformer\TransformationRule;

class TransformationRuleSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(TransformationRule::class);
    }

    public function let(): void
    {
        $this->beConstructedWith(
            'field1',
            'field2',
        );
    }

    public function it_creates_getter_method_name(): void
    {
        $this->createGetterMethodName()->shouldBe('getField1');
    }
}
