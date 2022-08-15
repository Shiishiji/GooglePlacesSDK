<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

use Shiishiji\GooglePlacesSDK\DTO\Location;

class Geometry
{
    public readonly Location $location;
    public readonly ViewPort $viewPort;

    public function __construct(Location $location, ViewPort $viewport)
    {
        $this->location = $location;
        $this->viewPort = $viewport;
    }
}
