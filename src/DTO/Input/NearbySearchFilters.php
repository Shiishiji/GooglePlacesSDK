<?php

namespace Shiishiji\GooglePlacesSDK\DTO\Input;

class NearbySearchFilters
{
    /*
     * The text string on which to search, for example: "restaurant" or "123 Main Street". This must be a place name, address, or category of establishments.
     * Any other types of input can generate errors and are not guaranteed to return valid results. The Google Places service will return candidate matches
     * based on this string and order the results based on their perceived relevance.
     * Explicitly including location information using this parameter may conflict with the location, radius, and rankby parameters, causing unexpected results.
     * If this parameter is omitted, places with a business_status of CLOSED_TEMPORARILY or CLOSED_PERMANENTLY will not be returned.
     */
    private ?string $keyword;

    /*
     * Restricts results to only those places within the specified range.
     * Valid values range between 0 (most affordable) to 4 (most expensive), inclusive.
     * The exact amount indicated by a specific value will vary from region to region.
     */
    private ?string $maxPrice;

    /*
     * Restricts results to only those places within the specified range.
     * Valid values range between 0 (most affordable) to 4 (most expensive), inclusive.
     * The exact amount indicated by a specific value will vary from region to region.
     */
    private ?string $minPrice;

    /*
     * Equivalent to `keyword`.
     * Values in this field are combined with values in the `keyword` field and passed as part of the same search string.
     */
    private ?string $name;

    /*
     * Returns only those places that are open for business at the time the query is sent.
     * Places that do not specify opening hours in the Google Places database will not be returned if you include this parameter in your query.
     */
    private ?bool $openNow;

    /*
     * Specifies the order in which results are listed. Possible values are:
     * - `prominence` (default). This option sorts results based on their importance.
     *      Ranking will favor prominent places within the set radius over nearby places that match but that are less prominent.
     *      Prominence can be affected by a place's ranking in Google's index, global popularity, and other factors.
     *      When prominence is specified, the `radius` parameter is required.
     * - `distance`. This option biases search results in ascending order by their distance from the specified location.
     *      When `distance` is specified, one or more of `keyword`, `name`, or `type` is required and `radius` is disallowed.
     */
    private ?string $rankBy;

    /*
     * Defines the distance (in meters) within which to return place results.
     * You may bias results to a specified circle by passing a `location` and a `radius` parameter.
     * Doing so instructs the Places service to _prefer_ showing results within that circle; results outside of the defined area may still be displayed.
     * The radius will automatically be clamped to a maximum value depending on the type of search and other parameters.
     * Autocomplete: 50,000 meters
     * Nearby Search:
     *  with `keyword` or `name`: 50,000 meters
     *  without `keyword` or `name`
     *      Up to 50,000 meters, adjusted dynamically based on area density, independent of `rankby` parameter.
     * When using `rankby=distance`, the radius parameter will not be accepted, and will result in an `INVALID_REQUEST`.
     * Query Autocomplete: 50,000 meters
     * Text Search: 50,000 meters
     */
    private ?string $radius;

    /*
     * Restricts the results to places matching the specified type. Only one type may be specified. If more than one type is provided, all types following the first entry are ignored.
     * `type=hospital|pharmacy|doctor` becomes `type=hospital`
     * `type=hospital,pharmacy,doctor` is ignored entirely
        See the list of [supported types](https://developers.google.com/maps/documentation/places/web-service/supported_types).
        <div class="note">Note: Adding both `keyword` and `type` with the same value (`keyword=cafe&type=cafe` or `keyword=parking&type=parking`) can yield `ZERO_RESULTS`.</div>
     */
    private ?string $type;
    private ?string $location;
    private ?string $language;

    public function __construct(
        ?string $location,
        ?string $language,
        ?string $keyword = null,
        ?string $maxPrice = null,
        ?string $minPrice = null,
        ?string $name = null,
        ?bool $openNow = null,
        ?string $rankBy = null,
        ?string $radius = null,
        ?string $type = null,
    ) {
        $this->location = $location;
        $this->language = $language;
        $this->keyword = $keyword;
        $this->maxPrice = $maxPrice;
        $this->minPrice = $minPrice;
        $this->name = $name;
        $this->openNow = $openNow;
        $this->rankBy = $rankBy;
        $this->radius = $radius;
        $this->type = $type;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function getMaxPrice(): ?string
    {
        return $this->maxPrice;
    }

    public function getMinPrice(): ?string
    {
        return $this->minPrice;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getOpenNow(): ?bool
    {
        return $this->openNow;
    }

    public function getRankBy(): ?string
    {
        return $this->rankBy;
    }

    public function getRadius(): ?string
    {
        return $this->radius;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }
}
