# Lumen Microservice Architecture

This is a sample Microservice Architecture Built on top of Lumen and Passport.

Mysql used as Database.

Things used:

1. Lumen
2. Lumen/Passport
3. Guzzle Client to consume APIs.

Please follow the below steps after clone.

1. Copy .env.sample from APIGateway to .env
2. composer install
3. php artisan migrate
4. php artisan passport:install

Make sure you run your service on different port, for APIs to work.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
