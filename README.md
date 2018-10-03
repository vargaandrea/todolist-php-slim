# Slim Framework 3 Skeleton Application

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

    php composer.phar create-project slim/slim-skeleton [my-app-name]

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

To run the application in development, you can run these commands 

	cd [my-app-name]
	php composer.phar start

Run this command in the application directory to run the test suite

	php composer.phar test

That's it! Now go build something cool.



# More
JS:	

	composer require twbs/bootstrap
	composer require heimrichhannot/popper.js



Add Twig:

	composer require slim/twig-view
	
Add Phinx:

	composer require robmorgan/phinx
	
	vendor/bin/phinx init  // edit phinx.yml 

	vendor/bin/phinx create MyNewMigration
	
	vendor/bin/phinx migate -e environment
	
Reset db:

	vendor/bin/phinx migrate -e development -t 0
	
	


# Resources / docs / tutorials

Ajax form submit

	https://symfonycasts.com/screencast/javascript/ajax-form-submit



JQuery form validation

	https://www.sitepoint.com/basic-jquery-form-validation-tutorial/
	-> using: https://jqueryvalidation.org/
	-> https://jqueryvalidation.org/files/demo/bootstrap/index.html

Bootstrap / CSS

	https://hackerthemes.com/bootstrap-cheatsheet/