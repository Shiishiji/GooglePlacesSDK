SDK for GooglePlaces API

official google API documentation -> [here](https://developers.google.com/maps/documentation/places/web-service)

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
    clientFactory: new JsonClientFactory(
        configuration: $configuration,
    ),
    inputTransformer: new TransformerContext([
        new NearbySearchFiltersTransformer(), 
    ])
)
```

3. Execute NearbySearch request
```php
use Shiishiji\GooglePlacesSDK\DTO\Input\NearbySearchFilters;
use Shiishiji\GooglePlacesSDK\DTO\Location;

$facade->getNearbyPlaces(new NearbySearchFilters(
    location: new Location(lat: '40', lng: '-110'),
    language: 'en',
    radius: 4000, 
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