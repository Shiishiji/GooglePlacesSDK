SDK for GooglePlaces API

official google API documentation -> [here](https://developers.google.com/maps/documentation/places/web-service)


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
docker run --rm -t -v $PWD:/app google-places-sdk vendor/bin/phpunit
```

Run PHP CS fixer
```shell
docker run --rm -t -v $PWD:/app google-places-sdk vendor/bin/php-cs-fixer fix
```