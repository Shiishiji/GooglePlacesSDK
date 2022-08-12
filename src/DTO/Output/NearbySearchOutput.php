<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class NearbySearchOutput
{
    /**
     * @var array<Place>
     */
    public array $results;

    public readonly string $status;
    public readonly array $htmlAttributions;
    public readonly ?string $errorMessage;
    public readonly ?array $infoMessages;
    public readonly ?string $nextPageToken;

    public function __construct(
        array $results,
        string $status,
        array $htmlAttributions,
        ?string $errorMessage,
        ?array $infoMessages,
        ?string $nextPageToken,
    ) {
        $this->results = $results;
        $this->status = $status;
        $this->htmlAttributions = $htmlAttributions;
        $this->errorMessage = $errorMessage;
        $this->infoMessages = $infoMessages;
        $this->nextPageToken = $nextPageToken;
    }

    public function addResult(Place $result): void
    {
        $this->results[] = $result;
    }

    public function hasResults(): bool
    {
        return count($this->results) > 0;
    }
}
