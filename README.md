# urpl.io - Simple link shortener

![Preview image](assets/preview.png)

# Before you start

##### Upload db.sql to MySQL or PostgreSQL

##### Change the connection to your database in the file (app/config/AppConfiguration.php)

```php

public static $db_config = [
        'hostname' => 'your_host',
        'username' => 'your_db_user',
        'password' => 'db_user_password',
        'database' => 'your_db',
        'charset'  => 'utf8' // Or your charset
      ];

```

##### To change the login information for the admin panel, you will also have to change the variable in the same file


```php

public static $admin = [
        'login' => 'your_login',
        'password' => 'your_password'
      ];

```
