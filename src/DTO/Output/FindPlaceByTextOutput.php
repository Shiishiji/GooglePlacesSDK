<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\Place;

class FindPlaceByTextOutput
{
    /**
     * @var array<Place>
     */
    public array $candidates;

    public readonly string $status;
    public readonly ?string $errorMessage;
    public readonly ?array $infoMessages;

    public function __construct(
        array $candidates,
        string $status,
        ?string $errorMessage,
        ?array $infoMessages
    ) {
        $this->candidates = $candidates;
        $this->status = $status;
        $this->errorMessage = $errorMessage;
        $this->infoMessages = $infoMessages;
    }

    public function addCandidate(Place $candidate): void
    {
        $this->candidates[] = $candidate;
    }

    public function hasCandidates(): bool
    {
        return count($this->candidates) > 0;
    }
}
