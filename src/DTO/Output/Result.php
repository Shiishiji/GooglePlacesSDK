<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output;

class Result
{
    public readonly ?string $businessStatus;
    public readonly Geometry $geometry;
    public readonly string $icon;
    public readonly ?string $iconBackgroundColor;
    public readonly ?string $iconMaskBaseUri;
    public readonly string $name;

    /**
     * @var Photo[]|null
     */
    public ?array $photos;

    public readonly string $placeId;
    public readonly ?PlusCode $plusCode;
    public readonly null|float|int $rating;
    public readonly string $reference;
    public readonly string $scope;
    public readonly array $types;
    public readonly ?int $userRatingsTotal;
    public readonly string $vicinity;

    public function __construct(
        ?string $businessStatus,
        Geometry $geometry,
        string $icon,
        ?string $iconBackgroundColor,
        ?string $iconMaskBaseUri,
        string $name,
        ?iterable $photos,
        string $placeId,
        ?PlusCode $plusCode,
        null|float|int $rating,
        string $reference,
        string $scope,
        array $types,
        ?int $userRatingsTotal,
        string $vicinity,
    ) {
        $this->businessStatus = $businessStatus;
        $this->geometry = $geometry;
        $this->icon = $icon;
        $this->iconBackgroundColor = $iconBackgroundColor;
        $this->iconMaskBaseUri = $iconMaskBaseUri;
        $this->name = $name;
        $this->photos = $photos;
        $this->placeId = $placeId;
        $this->plusCode = $plusCode;
        $this->rating = $rating;
        $this->reference = $reference;
        $this->scope = $scope;
        $this->types = $types;
        $this->userRatingsTotal = $userRatingsTotal;
        $this->vicinity = $vicinity;
    }

    public function addPhoto(Photo $photo): void
    {
        $this->photos[] = $photo;
    }

    public function hasPhotos(): bool
    {
        return count($this->photos) > 0;
    }
}
