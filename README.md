# Steps:

#Step 1 : 
	
	run these in command line : 

	=>   composer install
	=>   php artisan config:cache
	=>   composer dump-autoload	

#Step 2 : 

	database dump is available in the root folder named santophy_db.sql

	or please run in command line : 
		php artisan migrate 
	command for create database.


#Step 3 : 
	to run the project

	run command in command line : 

		php artisan serve

		and access on browser by :  
			http://127.0.0.1:8000/

		or 
			hit the url 
			"http://localhost/santophy-task/public"
