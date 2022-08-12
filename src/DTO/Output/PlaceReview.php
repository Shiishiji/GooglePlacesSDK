<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class PlaceReview
{
    public readonly string $authorName;
    public readonly int $rating;
    public readonly string $relativeTimeDescription;
    public readonly int $time;
    public readonly ?string $authorUrl;
    public readonly ?string $language;
    public readonly ?string $profilePhotoUrl;
    public readonly ?string $text;

    public function __construct(
        string $authorName,
        int $rating,
        string $relativeTimeDescription,
        int $time,
        ?string $authorUrl,
        ?string $language,
        ?string $profilePhotoUrl,
        ?string $text
    ) {
        $this->authorName = $authorName;
        $this->rating = $rating;
        $this->relativeTimeDescription = $relativeTimeDescription;
        $this->time = $time;
        $this->authorUrl = $authorUrl;
        $this->language = $language;
        $this->profilePhotoUrl = $profilePhotoUrl;
        $this->text = $text;
    }
}
