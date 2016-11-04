##########################################
 Project name: Trip Planner - Oh no I forgot something!
##########################################

Requirements:
-Build a trip planning application that allows a user to create a list of items the user wishes to take along with them. 
-User needs to be able to CRUD items. 
-User should have the ability to flag an item as “needed to be bought” and be able to assign a price to that item. 
-User should be able to see a sublist of things that need to be bought,and able to check them off once they are purchased (a shopping sublist). 
-User should be able to see the cost of each item and the total costs of all items that need to be bought. 
-Additionally, a user needs to be able to assign items to Luggage Pieces, which he can also CRUD.


##########################################
 Archivements
##########################################

-User authroization includes registe, login, forgot password
-Luggages management includes create, edit, update and delete
-Items management includes create, edit, update and delete
-Ability to flag items as “needed to be bought” and can assign a price to that item.
-Ability to see  a sublist of things that need to be bought,and able to check them off once they are purchased
-Ability to see the cost of each item and the total costs of all items that need to be bought.
-Ability to assign items to Luggage Pieces and also can create, edit, update and delete
-Form validation: Item name and luggage name are mandentory; price only allow numbers.
-Alert messages will disappear after 2 seconds.
-Edit page will be shown in popup window.


##########################################
Technial Enviroment
##########################################

PHP5 Framework - Laravel, Mysql, jQuery, bootstrap, html5, css3.


##########################################
Project install instructions
##########################################

https://laravel.com/docs/5.3

Make sure your PHP >= 5.6.4

You could find information from the below files.
\TripPlanner\miscellaneous\read_me.txt
\TripPlanner\miscellaneous\db_diagram.png
\TripPlanner\miscellaneous\screen_shot.png
\TripPlanner\miscellaneous\trip_planner.sql(Only use this file when you fail to use "php artisan migrate" from laravel)

1.Create the database on your SQL Server named: trip_planner
2.Clone the project from gitbub by using the url:https://github.com/xiaofanggit/TripPlanner.git
If fail to clone from the github, you could find all code from the email attachment with the name .bak(TripPlanner.7z.bak). 
Reame it to TripPlanner.7z, and extract.
I would suggest you use TripPlanner.7z.bak because Laravel needs components inside vendor folder to run "php artisan", 
but vendor folder is not allowed to add to github.
Then it will have errors when you run github version untill you install all missed components.
3.Go to the project folder and find the file: .env (Take my computer as an example, it located at: C:\Users\xiaof\Code\TripPlanner\.env)
If you cannot find this file, rename .env.example into .env 
4.Modify the below commends to match your mssql server.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=trip_planner
DB_USERNAME=admin
DB_PASSWORD=admin

5.Modify the file: C:\Users\xiaof\Code\TripPlanner\config\database.php
 'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'trip_planner'),
            'username' => env('DB_USERNAME', 'admin'),
            'password' => env('DB_PASSWORD', 'admin'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
6.Give the folder storage and the bootstrap/cache the writable permission.
7.Make sure you can run 'php' globally. If you cannot, change your local variable path to add it:
8.cd TripPlanner(your project name)
9.run "php artisan migrate"
Then all tables will be created successfully.
If fail in this step because of some reasons, you could find the trip_planner.sql at: \TripPlanner\miscellaneous\trip_planner.sql
10.run "php artisan serve"
You will see the message: Laravel development server started on http://localhost:8000/trip_planner.sql
11.Run the url "http://localhost:8000/" in any browser and you will go to login page. Register first then try all functionalities.


##########################################
For detailed screenshots, pls check the \TripPlanner\miscellaneous\screen_shot.png file
##########################################