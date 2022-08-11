<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class NearbySearchOutput
{
    /**
     * @var array<Result>
     */
    public array $results;

    public readonly string $status;
    public readonly array $htmlAttributions;

    public function __construct(array $results, string $status, array $html_attributions)
    {
        $this->results = $results;
        $this->status = $status;
        $this->htmlAttributions = $html_attributions;
    }

    public function addResult(Result $result): void
    {
        $this->results[] = $result;
    }

    public function hasResults(): bool
    {
        return count($this->results) > 0;
    }
}
