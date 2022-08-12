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
        array $html_attributions,
        ?string $error_message,
        ?array $info_messages,
        ?string $next_page_token,
    ) {
        $this->results = $results;
        $this->status = $status;
        $this->htmlAttributions = $html_attributions;
        $this->errorMessage = $error_message;
        $this->infoMessages = $info_messages;
        $this->nextPageToken = $next_page_token;
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
