# ReteteRo - API component

Simple Angular + Laravel application for food recepies
(API component of the application)


===========================================================

# Running the api:


RUN Laravel app:
	php artisan serve

Open Laravel app:
	http://localhost:8000/



===========================================================



# Useful links:

- Heroku app page: https://dashboard.heroku.com/apps/retete-ro-api

- Laravel Docs: https://laravel.com/docs/8.x

Other links:
- https://appdividend.com/2017/09/22/laravel-5-5-angular-4-tutorial-example-scratch/
- https://scotch.io/tutorials/create-a-laravel-and-angular-single-page-comment-application
- https://medium.com/@juancarlosjc/angular-inside-laravel-b155736ea84b
- https://medium.com/@eloufirhatim/laravel-angular-authentication-bee4100e5e33
- https://www.toptal.com/laravel/restful-laravel-api-tutorial
- https://phpenthusiast.com/blog/develop-angular-php-app-getting-the-list-of-items
- https://itnext.io/how-to-deploy-angular-application-to-heroku-1d56e09c5147



===========================================================



# Installation + steps for configuring project:

- Install/Make composer globally:
	sudo chmod 755 composer.phar
	sudo cp composer.phar /usr/local/bin/composer
	composer -v



- Install Laravel app:
    composer create-project laravel/laravel --prefer-dist ReteteRo-API
    (ReteteRo-API - name of the Laravel project)



Heroku configuration:
(https://devcenter.heroku.com/articles/getting-started-with-laravel)

- Setup Heroku app and link it to the GitHub repo and set the 'main' branch for auto deployment



- Install Heroku CLI
	brew install heroku/brew/heroku



- Login into Heroku CLI:
	heroku login



- Create Heroku Procfile:
	Filename: Procfile
	(Tells Heroku what command to use to launch the web server with the correct settings)
	echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile



- Display Laravel Key:
	php artisan key:generate --show
	(Copy the displayed key)



- Set Laravel Key into Heroku app config:
	heroku config:set APP_KEY=<YOUR_API_KEY_HERE> -a retete-ro-api
	(retete-ro-api - name of the Heroku app)



- Change the log destination for production:
	In config/logging.php:

	return [
		'default' => env('LOG_CHANNEL', 'stack'),
		'channels' => [
			'stack' => [
				'driver' => 'stack',
				'channels' => ['single'],
			],
			'single' => [
				'driver' => 'errorlog',
				'level' => 'debug',
			],
		...



- Trusting the Load Balancer:
	In App\Http\Middleware\TrustProxies.php:

	namespace App\Http\Middleware;

	use Illuminate\Http\Request;
	use Fideloper\Proxy\TrustProxies as Middleware;

	class TrustProxies extends Middleware
	{
		protected $proxies = '*';
		protected $headers = Request:: HEADER_X_FORWARDED_AWS_ELB;
	}



- Create vhost (in order to access app as: http://retete-ro.local):
	Check 'vhost.conf' file
	
	If getting permission denied error:
	sudo chmod -R 777 storage/
	sudo chmod -R 777 bootstrap/cache/





===========================================================



# Laravel cheatsheet:


## Migration:

- Migrate data:
	php artisan migrate
	(Will create tables based on the files inside 'migrations' folder)


- Rollback data:
	php artisan migrate:rollback
	(Will remove all tables - only 'migrations' table will remain inside the DB)


- Create migration file
	php artisan make:migration create_recipes_table



## Seeding:

- Generate seeder:
	php artisan make:seeder <seeder_name>			(php artisan make:seeder UsersSeeder)


- Running Seeders:
	php artisan db:seed

	php artisan db:seed --class=<seeder_name>




## Factories:

- Generat factory:
	php artisan make:factory UserFactory




## Models:

- Genereate model (+ migration):
    php artisan make:model <model_name> -m			(php artisan make:model User)




## Resources:

- Genereate resource:
    php artisan make:resource <resource_name>



## Controllers:

- Generate controller:
	php artisan make:controller <controller_name>



## Middlewares:

- Generate middleware:
	php artisan make:middleware <middleware_name>