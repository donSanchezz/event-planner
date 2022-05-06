# Getting started

## Installation

Clone the repository (HTTPS)

    git clone https://github.com/donSanchezz/event-planner.git

Switch to the repo folder

    cd event-planner

Install all the dependencies using composer

    composer install

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
 
 Database seeding

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
