# aswesomeBlog

<h2>aswesomeBlog is my simple one day craft blog</h2>
<h1>Installing</h1>
<h4>
<ol>
<li> Clone the repo </li>
<li> copy the .env.example to a .env file </li>
<li> run </li>
php artisan key:generate </li>
to generate your key</li>
<li> instal dependecies through</li>
composer update</li>
composer dump-autoload</li>
<li> create a database with the same name in the .env file</li>
<li> run database migration </li>
php artisan migrate:fresh</li>
<li> optional extract the uploads zip file in the public directory (it contains seed images) and run the seeder </li>
php artisan db:seed </li>
<li> run php artisan serve </li>
<li> login via credintials found in UsersTableSeeder you can change them if you want. (<b>Important note</b> if you didn't run seeds then create a user using php Tinker </li>
</ol>
</h4>
