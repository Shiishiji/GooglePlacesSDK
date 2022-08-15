# SDK for GooglePlaces API

Official google API documentation -> [here](https://developers.google.com/maps/documentation/places/web-service)

### Installation
```shell
composer require shiishiji/google-places-sdk
```

### Usage

1. Get your access token and create Configuration object
```php
use Shiishiji\GooglePlacesSDK\Config\Configuration;

$configuration = new Configuration(
    authToken: 'this-is-place-for-your-token', 
);
```

2. Instantiate facade class
```php
use Shiishiji\GooglePlacesSDK\GooglePlacesFacade;
use Shiishiji\GooglePlacesSDK\Client\JsonClientFactory;
use Shiishiji\GooglePlacesSDK\Transformer\TransformerContext;
use Shiishiji\GooglePlacesSDK\Transformer\NearbySearchFiltersTransformer;

$facade = new GooglePlacesFacade(
    configuration: $configuration,
)
```

3. Examples

Execute Nearby Search request
```php
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Location;

$facade->getNearbyPlaces(new NearbySearchFilters(
    location: new Location(lat: '40', lng: '-110'),
    language: 'en',
    radius: 4000, 
));
```


Execute Find Place From Text request
```php
use Shiishiji\GooglePlacesSDK\DTO\Input\FindPlaceByTextFilters;
use Shiishiji\GooglePlacesSDK\DTO\Input\Partials\Fields;

$facade->getPlacesFromText(new FindPlaceByTextFilters(
    input: 'Museum of Contemporary Art Australia',
    inputType: 'textquery',
    fields: new Fields([Fields::FORMATTED_ADDRESS, Fields::PLACE_ID]),
    locationBias: 'ipbias',
    language: 'en',
));
```

### Development

Before any of command below, docker image must be build
```shell
docker build -t google-places-sdk . 
```

Install dependencies
```shell
docker run --rm -t -v $PWD:/app google-places-sdk composer install
```

Run tests
```shell
docker run --rm -t -v $PWD:/app google-places-sdk vendor/bin/phpspec run
```

Run PHP CS fixer
```shell
docker run --rm -t -v $PWD:/app google-places-sdk vendor/bin/php-cs-fixer fix
```