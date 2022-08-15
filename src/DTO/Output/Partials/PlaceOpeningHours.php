<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

class PlaceOpeningHours
{
    public readonly ?bool $openNow;

    /**
     * @var PlaceOpeningHoursPeriod[]|null
     */
    public ?array $periods;

    /**
     * @var string[]|null
     */
    public ?array $weekdayText;

    public function __construct(?bool $openNow, ?array $periods, ?array $weekdayText)
    {
        $this->openNow = $openNow;
        $this->periods = $periods;
        $this->weekdayText = $weekdayText;
    }

    public function addPeriod(PlaceOpeningHoursPeriod $period): void
    {
        $this->periods[] = $period;
    }

    public function hasPeriods(): bool
    {
        return count($this->periods) > 0;
    }
}
