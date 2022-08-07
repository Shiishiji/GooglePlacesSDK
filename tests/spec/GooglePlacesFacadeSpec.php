<?php

namespace spec\Shiishiji\GooglePlacesSDK;

use PhpSpec\ObjectBehavior;
use Shiishiji\GooglePlacesSDK\GooglePlacesFacade;

class GooglePlacesFacadeSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(GooglePlacesFacade::class);
    }
}
