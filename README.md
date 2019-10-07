# A very basic Lumen/React shopping cart application.

To run the application:
1. cd in the Docker directory
`cd docker`
2. Run `docker-compose up`
3. On first run, docker will pull down all the required containers and images. This process an take a bit, so please be patient
4. Once the containers have been built, ssh into the php container to run the migrations and seeds:
`docker exec -it cart-php bash

php artisan migrate:fresh --seed`
5. Once the DB has been created and seeded, the application will be available on http://localhost:3000

### Unit Tests
Very basic unit tests have been included, and can be run while SSH'd into the PHP container, and running `vendor/bin/phpunit`

### API Testing
The Lumen API package can be accessed directly at http://localhost:81/$routeName
