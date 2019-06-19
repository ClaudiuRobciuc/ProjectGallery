# Gallery Manager Website

## Setup

### Prerequisites

In order to build this and work with it locally, you need to have Docker installed on your machine. Get it [here](https://www.docker.com/community-edition#/download).

Furthermore, you need to have the following file:

-   A file called `.env` outlining the local environment variables to send to the container.

### Getting started

1. Run `docker-compose up -d --build`
2. Go to http://localhost
3. Profit

### Building


-   Run `docker-compose`, which works with the configuration in `docker-compose.yaml` and in turn spins up three Docker containers, namely:
    -   The main application (called `app`), which contains the PHP code
    -   Another container (called `db`) which represents the MySQL database 
    -   Another container (called 'webserver') which represents the local hosting server using NgInx
-   Run `docker exec -ti app bash` and then run `php artisan migrate` in order to create all the tables from the migrations
-   While still in the shell of the application (after you run php artisan migrate) run `php artisan db:seed` to seed your database with predefined entities.


### Running

Once the containers are up and running, you can test it out by accessing http://localhost.
In order to run the automated tests type `./vendor/bin/phpunit` (this will run the unit tests and you will have to run it inside the container) and afterwards `php artisan dusk` (this will run the functionality tests)




