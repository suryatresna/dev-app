## Devevelopment App

Development App of a simple web application where user can signup and another task-scheduling with test unit, this app built in with laravel framework.

This app is task for vacancy gojek. For demo you can access this url ![demo.geekdisq.co](http://demo.geekdisq.co)

# Required

* PHP 5.5 or higher
* Laravel 5.1 or higher
* NodeJs (optional)

# Install

Clone repository.

	$ git clone https://github.com/suryatresna/dev-app.git

Install module by composer

	$ composer install

After install module, the next step is migrate database with seeding raw data. Before that you have make sure creating database in your system and setup file Environment ('.env'). Then execute this command

	$ php artisan migrate --seed

If you want to custumize design, install 'gulp' with 'npm'
	
	$ npm install --global gulp

Compile assets 'css' and 'js' with gulp command
	
	$ gulp

# Running App

After install application, run website with command.
	
	$ php artisan serve

Then access by url given, example 'http://localhost:8000'

# Testing App

Before a test app, you have make sure installed phpunit in your system. here where you can install phpunit
	
	$ sudo apt-get install phpunit

For check version phpunit, using this command.
	
	$ phpunit -v

After install phpunit, you can test app by command.

	$ phpunit

There are execute in directory /test. The files test it is 
* InterfaceTest of Interface test to test link active and action form.
* UserTest of Test data user by check in database.

