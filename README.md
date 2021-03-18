# urpl.io - Simple link shortener

![Preview image](assets/preview.png)

# Before you start

##### Upload db.sql to MySQL or PostgreSQL

###### Change the connection to your database in the file (app/config/AppConfiguration.php)

```php

public static $db_config = [
        'hostname' => 'your_host',
        'username' => 'your_db_user',
        'password' => 'db_user_password',
        'database' => 'your_db',
        'charset'  => 'utf8' // Or your charset
      ];

```
