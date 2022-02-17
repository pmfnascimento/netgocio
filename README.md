# Instructions 

- run command:

<code>composer update</code><br>

- Create .env with:<br><br>

<code>APP_URL=http://localhost:8000</code><br>
<code>DB_CONNECTION=mysql<br></code><br>
<code>DB_HOST=127.0.0.1<br></code><br>
<code>DB_PORT=3306<br></code><br>
<code>DB_DATABASE= "Database Name"</code><br>
<code>DB_USERNAME=root</code><br>
<code>DB_PASSWORD=</code><br>
<code>TOKEN=</code><br><br>



- run the command:<br><br>

<code>php artisan key:generate</code><br><br>

- create database Mysql

- run the commands:<br><br>

<code>php artisan migrate</code><br>

<code>php artisan db:seed</code><br>

and finnaly run:

<code>php artisan serve</code><br><br>

Done!
