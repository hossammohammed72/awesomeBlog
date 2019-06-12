# aswesomeBlog

<h3>aswesomeBlog is my simple one day craft blog</h3>
<h1>Installing</h1>
1. Clont the repo
2. copy the .env.example to a .env file
3. run 
php artisan key:generate 
to generate your key
4. instal dependecies through 
composer update
composer dump-autoload
5. create a database with the same name in the .env file
6. run database migration 
php artisan migrate:fresh
8- optional extract the uploads zip file in the public directory (it contains seed images) and run the seede
php artisan db:seed
9- run php artisan serve
10 login via credintials found in UsersTableSeeder you can change them if you want. (<b>Important note</b> if you didn't run seeds then create a user using php Tinker
