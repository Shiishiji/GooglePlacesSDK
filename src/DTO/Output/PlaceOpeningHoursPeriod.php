<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class PlaceOpeningHoursPeriod
{
    public readonly PlaceOpeningHoursPeriodDetail $open;
    public readonly PlaceOpeningHoursPeriodDetail $close;

    public function __construct(PlaceOpeningHoursPeriodDetail $open, PlaceOpeningHoursPeriodDetail $close)
    {
        $this->open = $open;
        $this->close = $close;
    }
}
