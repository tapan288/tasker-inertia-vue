## About
Tasker Inertia Vue is a simple task manager app built with Laravel, Inertia, and Vue. It is a simple CRUD application that allows users to create tasks.

But, instead of creating the task from the controller, it makes an API call to the backend to create the task. The backend then returns the response, and depending on the response received, the frontend renders the task on the page.

## Installation Instructions

1. Clone the repository with `git clone https://github.com/tapan288/tasker-inertia-vue.git`
2. Install composer dependencies with `composer install`
3. Install npm dependencies with `npm install`, replace npm with the installed package manager on your machine if you are not using npm
4. Create a copy of your .env file with `cp .env.example .env`
5. Generate an app encryption key with `php artisan key:generate`
6. Create an empty database for our application
7. In the .env file, add database information to allow Laravel to connect to the database
8. Migrate the database with `php artisan migrate`
9.  Run `php artisan serve` to run the app on http://127.0.0.1:8000
10. Run `npm run build` to compile the assets
11. Visit http://127.0.0.1:8000 in your browser to see the app
