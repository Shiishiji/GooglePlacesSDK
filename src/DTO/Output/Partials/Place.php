<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Output\Partials;

class Place
{
    public readonly ?string $adrAddress;
    public readonly ?string $businessStatus;
    public readonly ?string $formattedAddress;
    public readonly ?string $formattedPhoneNumber;
    public readonly ?Geometry $geometry;
    public readonly ?string $icon;
    public readonly ?string $iconBackgroundColor;
    public readonly ?string $iconMaskBaseUri;
    public readonly ?string $internationalPhoneNumber;
    public readonly ?string $name;
    public readonly ?PlaceOpeningHours $openingHours;
    public readonly ?string $placeId;
    public readonly ?PlusCode $plusCode;
    public readonly ?int $priceLevel;
    public readonly null|float|int $rating;
    public readonly ?string $reference;

    /** This field is deprecated */
    public readonly ?string $scope;

    public readonly ?array $types;
    public readonly ?string $url;
    public readonly ?int $userRatingsTotal;
    public readonly ?int $utcOffset;
    public readonly ?string $vicinity;
    public readonly ?string $website;

    /**
     * @var AddressComponent[]|null
     */
    public ?array $addressComponents;

    /**
     * @var Photo[]|null
     */
    public ?array $photos;

    /**
     * @var PlaceReview[]|null
     */
    public ?array $reviews;

    public function __construct(
        ?string $adrAddress,
        ?string $businessStatus,
        ?string $formattedAddress,
        ?string $formattedPhoneNumber,
        ?Geometry $geometry,
        ?string $icon,
        ?string $iconBackgroundColor,
        ?string $iconMaskBaseUri,
        ?string $internationalPhoneNumber,
        ?string $name,
        ?PlaceOpeningHours $openingHours,
        ?string $placeId,
        ?PlusCode $plusCode,
        ?int $priceLevel,
        float|int|null $rating,
        ?string $reference,
        ?string $scope,
        ?array $types,
        ?string $url,
        ?int $userRatingsTotal,
        ?int $utcOffset,
        ?string $vicinity,
        ?string $website,
        ?array $addressComponents,
        ?array $photos,
        ?array $reviews
    ) {
        $this->adrAddress = $adrAddress;
        $this->businessStatus = $businessStatus;
        $this->formattedAddress = $formattedAddress;
        $this->formattedPhoneNumber = $formattedPhoneNumber;
        $this->geometry = $geometry;
        $this->icon = $icon;
        $this->iconBackgroundColor = $iconBackgroundColor;
        $this->iconMaskBaseUri = $iconMaskBaseUri;
        $this->internationalPhoneNumber = $internationalPhoneNumber;
        $this->name = $name;
        $this->openingHours = $openingHours;
        $this->placeId = $placeId;
        $this->plusCode = $plusCode;
        $this->priceLevel = $priceLevel;
        $this->rating = $rating;
        $this->reference = $reference;
        $this->scope = $scope;
        $this->types = $types;
        $this->url = $url;
        $this->userRatingsTotal = $userRatingsTotal;
        $this->utcOffset = $utcOffset;
        $this->vicinity = $vicinity;
        $this->website = $website;
        $this->addressComponents = $addressComponents;
        $this->photos = $photos;
        $this->reviews = $reviews;
    }

    public function addAddressComponent(AddressComponent $addressComponent): void
    {
        $this->addressComponents[] = $addressComponent;
    }

    public function hasAddressComponents(): bool
    {
        return count($this->addressComponents) > 0;
    }

    public function addPhoto(Photo $photo): void
    {
        $this->photos[] = $photo;
    }

    public function hasPhotos(): bool
    {
        return count($this->photos) > 0;
    }

    public function addReview(PlaceReview $review): void
    {
        $this->reviews[] = $review;
    }

    public function hasReviews(): bool
    {
        return count($this->reviews) > 0;
    }
}
