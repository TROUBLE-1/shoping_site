# shoping_site
dummy shopping site for whitebox pentestig

how I created this lab by just doing google

https://www.youtube.com/watch?v=tc_GwgdVx5k

# motive for creating this lab
To demonstrate how an attacker can misuse the admin's web page for unreistricted file upload by doing CSRf attack which is supported by blind stored XSS.

This a whitebox pentesing lab so you can also check out database for credentials or any other information.

open User account in normal window and admin's account in private window.

# installation
1. Extract the file into /var/www/html
2. run command:    service apache2 start && service mysql start
3. Create database shop_site
4. run shop_site.sql

   mysql "shop_site" < shop_site.sql
5. done

# create mysql user
run the following commands in mysql

CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';
FLUSH PRIVILEGES;


# edit config.php
edit the username and password in config.php
If you are running in windows dont edit
```
<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'user');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'shop_site');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>
```
