<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

use Shiishiji\GooglePlacesSDK\DTO\Location;

class ViewPort
{
    public readonly Location $northEast;
    public readonly Location $southWest;

    public function __construct(Location $northeast, Location $southwest)
    {
        $this->northEast = $northeast;
        $this->southWest = $southwest;
    }
}
