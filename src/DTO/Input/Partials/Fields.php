<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Input\Partials;

class Fields
{
    public const ADR_ADDRESS = 'adr_address';
    public const BUSINESS_STATUS = 'business_status';
    public const FORMATTED_ADDRESS = 'formatted_address';
    public const GEOMETRY = 'geometry';
    public const ICON = 'icon';
    public const ICON_MASK_BASE_URI = 'icon_mask_base_uri';
    public const ICON_BACKGROUND_COLOR = 'icon_background_color';
    public const NAME = 'name';
    public const PERMANENTLY_CLOSED = 'permanently_closed';
    public const PHOTO = 'photo';
    public const PLACE_ID = 'place_id';
    public const PLUS_CODE = 'plus_code';
    public const TYPE = 'type';
    public const URL = 'url';
    public const UTC_OFFSET = 'utc_offset';
    public const VICINITY = 'vicinity';

    public function __construct(
        private readonly array $fields,
    ) {
    }

    public function __toString(): string
    {
        return implode(',', $this->fields);
    }
}
