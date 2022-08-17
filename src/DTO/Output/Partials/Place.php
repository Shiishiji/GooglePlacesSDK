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
        ?string $adr_address,
        ?string $business_status,
        ?string $formatted_address,
        ?string $formatted_phone_number,
        ?Geometry $geometry,
        ?string $icon,
        ?string $icon_background_color,
        ?string $icon_mask_base_uri,
        ?string $international_phone_number,
        ?string $name,
        ?PlaceOpeningHours $opening_hours,
        ?string $place_id,
        ?PlusCode $plus_code,
        ?int $price_level,
        float|int|null $rating,
        ?string $reference,
        ?string $scope,
        ?array $types,
        ?string $url,
        ?int $user_ratings_total,
        ?int $utc_offset,
        ?string $vicinity,
        ?string $website,
        ?array $address_components,
        ?array $photos,
        ?array $reviews
    ) {
        $this->adrAddress = $adr_address;
        $this->businessStatus = $business_status;
        $this->formattedAddress = $formatted_address;
        $this->formattedPhoneNumber = $formatted_phone_number;
        $this->geometry = $geometry;
        $this->icon = $icon;
        $this->iconBackgroundColor = $icon_background_color;
        $this->iconMaskBaseUri = $icon_mask_base_uri;
        $this->internationalPhoneNumber = $international_phone_number;
        $this->name = $name;
        $this->openingHours = $opening_hours;
        $this->placeId = $place_id;
        $this->plusCode = $plus_code;
        $this->priceLevel = $price_level;
        $this->rating = $rating;
        $this->reference = $reference;
        $this->scope = $scope;
        $this->types = $types;
        $this->url = $url;
        $this->userRatingsTotal = $user_ratings_total;
        $this->utcOffset = $utc_offset;
        $this->vicinity = $vicinity;
        $this->website = $website;
        $this->addressComponents = $address_components;
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
