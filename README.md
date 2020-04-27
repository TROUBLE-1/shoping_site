# Description for the vulnerablity
- There is a contact form for the signed in users to send messages to admin. 
- Admin has a feature to change the directory for the file upload during contact form.
- Attachments are uploaded in tmp folder which contains .htaccess file which restricts users to access any file in it

Attacker can do an blind xss attack at contact from which will be executed at admin, payload contains XHR request which will change the directory to ../attacker so that attachments will be uploaded outside the tmp folder, attacker will again fill up the contact form by uploading webshell with .phtml extention which results to RCE

[Watch this quick video](https://www.youtube.com/watch?v=mJTrXnzoXII)

# Shopping_site
dummy shopping site for whitebox pentestig

how I created this lab by just doing google
[Click me](https://www.youtube.com/watch?v=tc_GwgdVx5k)

# Motive for creating this lab
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

# Create mysql user
Run the following commands in mysql

CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'user'@'localhost';
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
