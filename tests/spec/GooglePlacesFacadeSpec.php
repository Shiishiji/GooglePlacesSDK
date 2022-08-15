<?php

namespace spec\Shiishiji\GooglePlacesSDK;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Shiishiji\GooglePlacesSDK\Client\ClientFactoryInterface;
use Shiishiji\GooglePlacesSDK\Config\Configuration;
use Shiishiji\GooglePlacesSDK\DTO\Input\FindPlaceByTextFilters;
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Input\Partials\Fields;
use Shiishiji\GooglePlacesSDK\DTO\Location;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\Geometry;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\Photo;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\Place;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\PlaceOpeningHours;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\PlusCode;
use Shiishiji\GooglePlacesSDK\DTO\Output\Partials\ViewPort;
use Shiishiji\GooglePlacesSDK\GooglePlacesFacade;
use Shiishiji\GooglePlacesSDK\Transformer\InputTransformerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GooglePlacesFacadeSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(GooglePlacesFacade::class);
    }

    public function let(
        ClientFactoryInterface $clientFactory,
        InputTransformerInterface $inputTransformer,
    ): void {
        $this->beConstructedWith(
            new Configuration('token'),
            $clientFactory,
            $inputTransformer,
        );
    }

    public function it_executes_nearby_places_request(
        HttpClientInterface $client,
        ClientFactoryInterface $clientFactory,
        InputTransformerInterface $inputTransformer,
        ResponseInterface $response,
    ): void {
        $clientFactory->create(Argument::type('array'))
            ->shouldBeCalledOnce()
            ->willReturn($client);

        $inputTransformer->transform(Argument::type(NearbySearchFilters::class))
            ->willReturn([])
            ->shouldBeCalledOnce();

        $clientRequest = $client->request(
            'GET',
            'nearbysearch/json',
            Argument::that(function ($argument) {
                if (!isset($argument['auth_bearer'])) {
                    return false;
                }

                return !(!isset($argument['query']))

                ;
            })
        );

        $jsonResponse = '{"html_attributions":[],"results":[{"geometry":{"location":{"lat":49.0589648,"lng":20.0799302},"viewport":{"northeast":{"lat":49.10835397972727,"lng":20.1106650811216},"southwest":{"lat":49.00911916329687,"lng":20.01303051003161}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png","icon_background_color":"#7B9EB0","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Szczyrba","photos":[{"height":2976,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/104914298577535341851\">Tomekk Tomáš</a>"],"photo_reference":"AeJbb3dpYywJx_lHs1khwb5ZKR8Fn_wlhGglAN_sBRsXzXnXp0VxwP8RuAdMu8zZiK5bVdl_KOL4eNSXjwnIVnH9TVlH_faZd3c-aVTJmCBmlPaIJaf6QWA1i0RJHRuaE-v7x5l5UT2oXiuvkOFDOViIQx85g1zup7gfUYXFmJIZRVjp5fKI","width":6000}],"place_id":"ChIJ8Tigi2coPkcRcFSXxtH3AAQ","reference":"ChIJ8Tigi2coPkcRcFSXxtH3AAQ","scope":"GOOGLE","types":["locality","political"],"vicinity":"Szczyrba"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.0144355,"lng":19.989538},"viewport":{"northeast":{"lat":49.0154804802915,"lng":19.9907276802915},"southwest":{"lat":49.0127825197085,"lng":19.9880297197085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png","icon_background_color":"#13B5C7","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Stanica Benkovo","photos":[{"height":1836,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/112772194934907739947\">Dusan Kelo</a>"],"photo_reference":"AeJbb3fG1eYiQ-q9uIBuzHX51Bd4p-Mbu4YeJ3uqLHXTxXwHlmI7EvhwQ8fJksXFgrWuxUwbMTEyrsWszLRNFmTpqN6n6iWAHWjGVFWpdos8EcZrhAYX-Dzav_tA0xEZjqE3lieABfV_dQLK0Y-NPghZCUEQOn4KsKNvOStE1oQaac0nY2H4","width":3264}],"place_id":"ChIJ2RmFoyKHFUcRpRYl0Vfax8U","plus_code":{"compound_code":"2X7Q+QR Kráľova Lehota, Słowacja","global_code":"8FXX2X7Q+QR"},"rating":4.6,"reference":"ChIJ2RmFoyKHFUcRpRYl0Vfax8U","scope":"GOOGLE","types":["tourist_attraction","point_of_interest","establishment"],"user_ratings_total":5,"vicinity":"Kráľova Lehota"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.0181571,"lng":19.9994533},"viewport":{"northeast":{"lat":49.0194405302915,"lng":20.0011699302915},"southwest":{"lat":49.0167425697085,"lng":19.9984719697085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png","icon_background_color":"#7B9EB0","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Vodopád Hlboký potok","photos":[{"height":6000,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/103973084333582816559\">Radoslava Šteczová</a>"],"photo_reference":"AeJbb3ep0jZJIygcblHDYE5ZEVSvMbSE46VgJdAqpwk3pa0E6oBfxrwOJKIjIqXqBTjhKTErwaMmrV6l7aWJudpNOUbTG6QI4Jq6FVHYlg95i496-wLENpbFBs6ywZ68-W16510mzrtvvK-3TL061A4fCdvp5KQn5__EqmpPLKUka2m0gedr","width":8000}],"place_id":"ChIJIckO9kkpPkcRnyDCR9oWhf4","plus_code":{"compound_code":"2X9X+7Q Ważec, Słowacja","global_code":"8FXX2X9X+7Q"},"rating":4.4,"reference":"ChIJIckO9kkpPkcRnyDCR9oWhf4","scope":"GOOGLE","types":["point_of_interest","establishment"],"user_ratings_total":7,"vicinity":"Unnamed Road"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":48.99037620000001,"lng":19.966676},"viewport":{"northeast":{"lat":48.99193393029149,"lng":19.96805593029151},"southwest":{"lat":48.9892359697085,"lng":19.9653579697085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/park-71.png","icon_background_color":"#4DB546","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/tree_pinlet","name":"Ipoltica NP Nízke Tatry","opening_hours":{"open_now":true},"photos":[{"height":3024,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/103502455927636238033\">Václav Sedlatý</a>"],"photo_reference":"AeJbb3eM-voLElk8t9tT6dtuYN2i7D8_OZTXW-dg44d86rLhh6aMeQ3YMQkoIxd-f26jfaO8T5qYCq_CZLq1Vn_liaLmT5tjiJ0jdBlCR36eOuZ4otqTV1MfGZZi3PhPzc8RtW2QZPq06-H5vgW2d6WJHULoiZ_ur5mf2I9wlm5-qtP3Q5ST","width":4032}],"place_id":"ChIJo_Hy6HQqPkcRSiomaZS3fRc","plus_code":{"compound_code":"XXR8+5M Kráľova Lehota, Słowacja","global_code":"8FWXXXR8+5M"},"rating":5,"reference":"ChIJo_Hy6HQqPkcRSiomaZS3fRc","scope":"GOOGLE","types":["park","point_of_interest","establishment"],"user_ratings_total":5,"vicinity":"Kráľova Lehota"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.0149595,"lng":19.9683089},"viewport":{"northeast":{"lat":49.0163937302915,"lng":19.9696332802915},"southwest":{"lat":49.0136957697085,"lng":19.9669353197085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/park-71.png","icon_background_color":"#4DB546","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/tree_pinlet","name":"Horáreň Brezová","photos":[{"height":3024,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/103502455927636238033\">Václav Sedlatý</a>"],"photo_reference":"AeJbb3drto8TNIbr_7uc-jN6BWj5MmC_sBDCzpFP_EoXOezDlKGbo8LG-RWrKCqdL9Lu1m1BWMjWDV1aBActCNtho07wqrZ5_6jtn_dnsbAnuyYHIG5xLfFWpUyM-ZyLRzn0sGYq3QOp_S3y1q8Mm4TJuDzrscdwjuU1Df6L6ef0GsbGZCHX","width":4032}],"place_id":"ChIJs0HNa9GHFUcRAbx1Dj1Fy_s","plus_code":{"compound_code":"2X79+X8 Kráľova Lehota, Słowacja","global_code":"8FXX2X79+X8"},"rating":5,"reference":"ChIJs0HNa9GHFUcRAbx1Dj1Fy_s","scope":"GOOGLE","types":["park","point_of_interest","establishment"],"user_ratings_total":7,"vicinity":"Čierny Váh, 1220"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.0153812,"lng":20.033754},"viewport":{"northeast":{"lat":49.0166143802915,"lng":20.0349320302915},"southwest":{"lat":49.0139164197085,"lng":20.03223406970849}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/park-71.png","icon_background_color":"#4DB546","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/tree_pinlet","name":"Horáreň Biely Potok","photos":[{"height":900,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/108545569841446688391\">Jaroslava Uličná</a>"],"photo_reference":"AeJbb3cCo0t_1o-d09iRkqqoNi9pZnZQC485IXq4CNnpE4b8sRJ1CrvEoLZriUdneX7RkoFwrTf_CjNDz7BYI7Hqqa-qAUaQk81OYD-DZskZXgbriT32xrNYIUfTE-QaGVsmfgMaOvSRkZ9iJJ42wMAO3nS84cGcNdifRKXq0myO2dV0-XqW","width":1600}],"place_id":"ChIJzw7bx4gpPkcRA1JyppZOKlk","plus_code":{"compound_code":"228M+5G Liptovská Teplička, Słowacja","global_code":"8GX2228M+5G"},"rating":4.6,"reference":"ChIJzw7bx4gpPkcRA1JyppZOKlk","scope":"GOOGLE","types":["park","point_of_interest","establishment"],"user_ratings_total":7,"vicinity":"Liptovská Teplička"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.0145513,"lng":19.9624699},"viewport":{"northeast":{"lat":49.0158894302915,"lng":19.9638256302915},"southwest":{"lat":49.0131914697085,"lng":19.9611276697085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/park-71.png","icon_background_color":"#4DB546","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/tree_pinlet","name":"Rázcestie Brezová","place_id":"ChIJAT9ZtS-HFUcRR7NIV-RWS90","plus_code":{"compound_code":"2X76+RX Kráľova Lehota, Słowacja","global_code":"8FXX2X76+RX"},"reference":"ChIJAT9ZtS-HFUcRR7NIV-RWS90","scope":"GOOGLE","types":["park","point_of_interest","establishment"],"vicinity":"Unnamed Road"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.01168180000001,"lng":19.9555198},"viewport":{"northeast":{"lat":49.0130425802915,"lng":19.9568491802915},"southwest":{"lat":49.0103446197085,"lng":19.9541512197085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png","icon_background_color":"#13B5C7","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Cyklotrasa Benkovo","opening_hours":{"open_now":true},"photos":[{"height":3024,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/103502455927636238033\">Václav Sedlatý</a>"],"photo_reference":"AeJbb3dpuoftZ7jGHIS4mhLFDPti4lcdlvAm6b3IvLIFG-kz73qt494vrrE7SP3rwQu9UodqJY9PkqI1oLrmBHV44yMUsMWd4f0WgyjleLHkV6pcOVau7oDCBdWIM46A5WWjWF23tEyYzUr_0EnVkylGnDr6izVU0yJkIafhajm-BDKzI5_8","width":4032}],"place_id":"ChIJk8FVs2qBFUcRSovxvti1G14","plus_code":{"compound_code":"2X64+M6 Kráľova Lehota, Słowacja","global_code":"8FXX2X64+M6"},"rating":5,"reference":"ChIJk8FVs2qBFUcRSovxvti1G14","scope":"GOOGLE","types":["tourist_attraction","point_of_interest","establishment"],"user_ratings_total":3,"vicinity":"Kráľova Lehota"},{"business_status":"OPERATIONAL","geometry":{"location":{"lat":49.013627,"lng":20.047396},"viewport":{"northeast":{"lat":49.0149642802915,"lng":20.0487295802915},"southwest":{"lat":49.0122663197085,"lng":20.0460316197085}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png","icon_background_color":"#7B9EB0","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Tretí Cíp","place_id":"ChIJvUnpDsspPkcRJ09v1A46EiM","plus_code":{"compound_code":"227W+FX Liptovská Teplička, Słowacja","global_code":"8GX2227W+FX"},"rating":5,"reference":"ChIJvUnpDsspPkcRJ09v1A46EiM","scope":"GOOGLE","types":["point_of_interest","establishment"],"user_ratings_total":4,"vicinity":"3061"},{"geometry":{"location":{"lat":49.059605,"lng":19.9801243},"viewport":{"northeast":{"lat":49.11677169764708,"lng":20.03860432914988},"southwest":{"lat":49.0122375734764,"lng":19.93363218727404}}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png","icon_background_color":"#7B9EB0","icon_mask_base_uri":"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet","name":"Ważec","photos":[{"height":3648,"html_attributions":["<a href=\"https://maps.google.com/maps/contrib/118249118242989029885\">Lubo Rasi</a>"],"photo_reference":"AeJbb3c99xXGXOT8ar7_qRZrPR6mjQyuafB6U7B2QldJaIjoFqlJBaA-fc4I-avQJU66tIWoEu1yFPbi3w1eNX_l7vSiR3ldjvf30OUjXH49L-36FbtAoHOReKzsxAE8a-eN-h8eAocJQlWzJeJyvPT6vPjZuUr6BRffOtHIh4Y_ReLw8x2a","width":2736}],"place_id":"ChIJEaWNLZaHFUcRwBCXxtH3AAQ","reference":"ChIJEaWNLZaHFUcRwBCXxtH3AAQ","scope":"GOOGLE","types":["locality","political"],"vicinity":"Ważec"}],"status":"OK"}';
        $clientRequest
            ->willReturn($response)
            ->shouldBeCalledOnce();

        $response->getContent()
            ->willReturn($jsonResponse)
            ->shouldBeCalledOnce();

        $output = $this->getNearbyPlaces(new NearbySearchFilters(
            location: new Location(lat: 49, lng: 20),
            language: 'pl',
            radius: '4000'
        ));

        $output->status->shouldBe('OK');
        $output->results->shouldBeArray();
        $output->results[0]->shouldBeAnInstanceOf(Place::class);
        $output->results[0]->geometry->shouldBeAnInstanceOf(Geometry::class);
        $output->results[0]->geometry->location->shouldBeAnInstanceOf(Location::class);
        $output->results[0]->geometry->viewPort->shouldBeAnInstanceOf(ViewPort::class);
        $output->results[0]->geometry->viewPort->northEast->shouldBeAnInstanceOf(Location::class);
        $output->results[0]->geometry->viewPort->southWest->shouldBeAnInstanceOf(Location::class);
        $output->results[0]->photos->shouldBeArray();
        $output->results[0]->photos[0]->shouldBeAnInstanceOf(Photo::class);
        $output->results[0]->plusCode->shouldBeNull();
        $output->results[2]->plusCode->shouldBeAnInstanceOf(PlusCode::class);
        $output->results[2]->types->shouldBeArray();
        $output->results[2]->types->shouldContain('point_of_interest');
        $output->results[2]->types->shouldContain('establishment');
    }

    public function it_executes_places_from_text_request(
        HttpClientInterface $client,
        ClientFactoryInterface $clientFactory,
        InputTransformerInterface $inputTransformer,
        ResponseInterface $response,
    ): void {
        $clientFactory->create(Argument::type('array'))
            ->shouldBeCalledOnce()
            ->willReturn($client);

        $inputTransformer->transform(Argument::type(FindPlaceByTextFilters::class))
            ->willReturn([])
            ->shouldBeCalledOnce();

        $clientRequest = $client->request(
            'GET',
            'findplacefromtext/json',
            Argument::that(function ($argument) {
                if (!isset($argument['auth_bearer'])) {
                    return false;
                }

                return !(!isset($argument['query']))

                ;
            })
        );

        $jsonResponse = '{"candidates":[{"formatted_address":"140 George St, The Rocks NSW 2000, Australia","geometry":{"location":{"lat":-33.8599358,"lng":151.2090295},"viewport":{"northeast":{"lat":-33.85824377010728,"lng":151.2104386798927},"southwest":{"lat":-33.86094342989272,"lng":151.2077390201073}}},"name":"Museum of Contemporary Art Australia","opening_hours":{"open_now":false},"rating":4.4}],"status":"OK"}';
        $clientRequest
            ->willReturn($response)
            ->shouldBeCalledOnce();

        $response->getContent()
            ->willReturn($jsonResponse)
            ->shouldBeCalledOnce();

        $output = $this->getPlacesFromText(new FindPlaceByTextFilters(
            input: 'Museum of Contemporary Art Australia',
            inputType: 'textquery',
            fields: new Fields([Fields::FORMATTED_ADDRESS, Fields::PLACE_ID]),
            locationBias: 'ipbias',
            language: 'en',
        ));

        $output->status->shouldBe('OK');
        $output->candidates->shouldBeArray();
        $output->candidates[0]->shouldBeAnInstanceOf(Place::class);
        $output->candidates[0]->geometry->shouldBeAnInstanceOf(Geometry::class);
        $output->candidates[0]->geometry->location->shouldBeAnInstanceOf(Location::class);
        $output->candidates[0]->geometry->viewPort->shouldBeAnInstanceOf(ViewPort::class);
        $output->candidates[0]->geometry->viewPort->northEast->shouldBeAnInstanceOf(Location::class);
        $output->candidates[0]->geometry->viewPort->southWest->shouldBeAnInstanceOf(Location::class);
        $output->candidates[0]->name->shouldBe('Museum of Contemporary Art Australia');
        $output->candidates[0]->openingHours->shouldBeAnInstanceOf(PlaceOpeningHours::class);
        $output->candidates[0]->rating->shouldBe(4.4);
    }
}
