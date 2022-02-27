Database Connection
https://www.expertsphp.com/database-connection-in-laravel/

In this we will learn how to create a database connection in laravel. When you open the folder project of laravel, you will find a file named .env in it. You can connect to your database by typing your database name, user name and password in the same file. You can see it in the image below. You will see that the file of .env will be displayed in it.

As I am going to tell you in the following example, you can see that this connection is of laravel. You just have to type the database name, user name and password, you can see here too.

Keywords :- Database Connection in laravel 6.0, Database Connection in laravel 5.8, Database Connection in laravel 5.7, Database Connection in laravel 5.6, Database Connection in laravel 5.5, Database Connection in laravel 5.4, laravel 5.3, laravel 5.2

APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:Lrha/Q0oTFi09G0qm6HI4kqj9ekQB9sK5L4/8AgOop0=
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name    //database name here
DB_USERNAME=username   //database username here
DB_PASSWORD=password   //database password here

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null


vagrant@ubuntu-bionic:/var/www/html/projects/99Services/Backend$ php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.22 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.13 seconds)
vagrant@ubuntu-bionic:/var/www/html/projects/99Services/Backend$