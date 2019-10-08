# A very basic Lumen/React shopping cart application.

To run the application:
1. cd in the Docker directory
```cd docker```
2. Run ```docker-compose up```
3. On first run, docker will pull down all the required containers and images. This process an take a bit,
so please be patient. You will know the containers have completed buliding when you see
 ```cart-node     | Starting the development server...``` in the stdout of the docker containers
4. Copy the `.env.example` file into `.env` by running `cp .env.example .env`. The example file should be enough to run the PHP API
5. Once the containers have been built, ssh into the php container ```docker exec -it cart-php bash```
6. Run ```composer install``` to install the required composer packages
7. Run the migrations and seeds to finish setting up the API `cd cart
php artisan migrate:fresh --seed`

### Unit Tests
Very basic unit tests have been included, and can be run while SSH'd into the PHP container, and running ```vendor/bin/phpunit```

### API Testing
The Lumen API package can be accessed directly at http://localhost:81/$routeName
