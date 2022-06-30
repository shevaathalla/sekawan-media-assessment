### Code base of Nickel Drive for Sekawan Media Assesment

This application built using laravel 8.

Language: markdown
Path: README.md

---

# Getting started

## Credentials

- Username: admin@mail.com
- Password: password

## Requirement

-   Laravel (Composer)
-   PHP 7.4+
-   Node
-   MySQL

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone https://github.com/shevaathalla/sekawan-media-assessment.git

Switch to the repo folder

    cd sekawan-media-assessment

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Install frontend dependecies

    npm install

Generate scaffolding template

    npm run dev

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/shevaathalla/sekawan-media-assessment.git
    cd sekawan-media-assessment
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install
    npm run dev
    php artisan serve

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database schema ERD

schema can be viewed in this link:

https://dbdocs.io/shevaathalla/nickel_drive

## Database seeding

**Populate the database with seed data with relationships which includes users, vehicles, drivers. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the MasterSeeder and set the property values as per your requirement

    database/seeds/MasterSeeder.php

Run the database seeder and you're done

    php artisan db:seed

If you want to add the dummy data do the following command it will generate 100 driver and each will have 10 order

    php artisan db:seed --class=DummySeeder

**_Note_** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

# Code overview

## Folders

-   `app/Models` - Contains all the Eloquent models
-   `app/Http/Middleware` - Contains the middleware
-   `app/Http/Controllers` - Contains the controllers
-   `config` - Contains all the application configuration files
-   `database/factories` - Contains the model factory for all the models
-   `database/migrations` - Contains all the database migrations
-   `database/seeds` - Contains the database seeder
-   `routes` - Contains all the api routes defined in api.php file

## Environment variables

-   `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

---
