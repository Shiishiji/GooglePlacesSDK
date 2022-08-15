<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

class PlaceOpeningHoursPeriodDetail
{
    public readonly int $day;
    public readonly string $time;

    public function __construct(int $day, string $time)
    {
        $this->day = $day;
        $this->time = $time;
    }
}
