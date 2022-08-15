<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

class Photo
{
    public readonly array $htmlAttributions;
    public readonly int $height;
    public readonly int $width;
    public readonly string $photoReference;

    public function __construct(array $html_attributions, int $height, int $width, string $photo_reference)
    {
        $this->htmlAttributions = $html_attributions;
        $this->height = $height;
        $this->width = $width;
        $this->photoReference = $photo_reference;
    }
}
