# Jabu Task Test

This is a task management system. The system allows users to create periodic tasks(i.e Daily,weekly,monthly and yearly) and group them into task groups. The tasks can be viewed in a list, Pending tasks can be completed and organized by dates

## Features

- Creation of periodic tasks: Users can create tasks and define iteration duration  from date A to date B or for N iterations as well.
- Task grouping: Users can create group and attach task to specific group.
- Task listing: The application displays a list of tasks, organized by date. Tasks are grouped into "Tasks Today," "Tasks Tomorrow," "Tasks Next Week," "Tasks in the Near Future," and "Tasks in the Future."
- Task completion: Users can mark a task as completed.

## Technologies Used

- Laravel
- Livewire
- Tailwind CSS
- Wire Ui


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation#installation)

Clone the repository

    git clone [Repository url]

Switch to the repo folder

    cd [Repository name]

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**) seed the database as well to create raw tasks

    php artisan migrate --seed


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

# Design snippets

Email: user@test.com

Password: 1234

Login:
![screenshot-127 0 0 1_8000-2023 05 08-15_26_21](https://user-images.githubusercontent.com/61405290/236801416-55651ffd-591d-4392-8959-b78e351296d5.png)

Task Group Creation:
![screenshot-127 0 0 1_8000-2023 05 08-15_23_22](https://user-images.githubusercontent.com/61405290/236801948-59707624-ff6a-4fb4-b0ad-d064f270863d.png)

Task Creation:
![screenshot-127 0 0 1_8000-2023 05 08-15_25_07](https://user-images.githubusercontent.com/61405290/236801980-241cd5a5-b7a5-4a3e-aff0-c46ab34f7ba6.png)

Task Listing:
![screenshot-127 0 0 1_8000-2023 05 08-15_25_52](https://user-images.githubusercontent.com/61405290/236802001-8fdb0635-436c-4b93-a47b-213f1b159f4f.png)


**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content. THIS IS OPTIONAL**

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.


