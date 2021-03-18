Прежде чем начать, Вам нужно: </br>
Один сервер Ubuntu и обычный пользователь без прав root с привилегиями sudo. Также вам потребуется включить базовый брандмауэр, чтобы заблокировать все порты, кроме необходимых. </br>


## 1. Установка Apache

##### Обновляем локальный индекс пакетов:

``` linux
$ sudo apt update
```

##### Далее устанавливаем пакет <code>Apache2</code>

``` linux
$ sudo apt install apache2
```

## 2. Настройка брандмауэра

##### Проверьте доступные профили приложений <code>ufw</code>:

``` linux
$ sudo ufw app list

Output
Available applications:
  Apache
  Apache Full
  Apache Secure
  OpenSSH
  
```

##### Далее активируем профиль с наибольшими ограничениями, который будет разрешать заданный трафик (порт 80):

``` linux
$ sudo ufw allow 'Apache'
```

##### Также проверим изменение

``` linux
$ sudo ufw status

Output
Status: active

To                         Action      From
--                         ------      ----
OpenSSH                    ALLOW       Anywhere                  
Apache                     ALLOW       Anywhere                  
OpenSSH (v6)               ALLOW       Anywhere (v6)             
Apache (v6)                ALLOW       Anywhere (v6)

```
## 3. Проверка веб-сервера:

``` linux
$ sudo systemctl status apache2

Output
apache2.service - The Apache HTTP Server
     Loaded: loaded (/lib/systemd/system/apache2.service; enabled; vendor prese>
     Active: active (running) since Tue 2020-04-28 23:06:40 UTC; 56s ago
       Docs: https://httpd.apache.org/docs/2.4/
   Main PID: 13785 (apache2)
      Tasks: 55 (limit: 1137)
     Memory: 5.3M
     CGroup: /system.slice/apache2.service
             ├─13785 /usr/sbin/apache2 -k start
             ├─13787 /usr/sbin/apache2 -k start
             └─13788 /usr/sbin/apache2 -k start

```

##### Открываем страницу Apache и проверяем работу
``` linux
http://your_server_ip
```

## 4. Установка MySQL
``` linux
$ sudo apt install mysql-server
```

##### Плагин для валидации паролей (необязательно для тестового сервера)
``` linux
$ sudo mysql_secure_installation
```

##### Вход в MySQL
``` linux
$ sudo mysql
```

## 5. Установка PHP

``` linux
$ sudo apt install php libapache2-mod-php php-mysql
```

##### Далее открываем файл <code>dir.conf</code> с правами root-пользователя

``` linux
$ sudo nano /etc/apache2/mods-enabled/dir.conf
```

##### В итоге видим содержимое файла

```
<IfModule mod_dir.c>
    DirectoryIndex index.html index.cgi index.pl index.php index.xhtml index.htm
</IfModule>
```

##### Делаем приоритет на index.php

```
<IfModule mod_dir.c>
    DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm
</IfModule>
```

##### Перезагружаем Apache, чтобы изменения вступили в силу:

``` linux
$ sudo systemctl restart apache2
```

##### Далее устанавливаем необходимые библиотеки для PHP

Для установки PDO
``` linux
$ sudo apt install PDO
```
Для других библиотек

``` linux
$ sudo apt install package1, package2, ...
```

## 6. Тестируем сервер

##### Создаем в папке '/var/www/html/' скрипт hello.php

``` linux
$ sudo nano /var/www/html/hello.php
```

##### Открываем файл и вводим в него

``` php
<?php
  echo "Hello World!";
?>
```

##### Переходим на него через URL: <code>http://ваш_ip_адрес/hello.php</code>

##### Далее можете его удалить через команду:

``` linux
$ sudo rm /var/www/html/hello.php
```
###### Но также Вы еще можете установить phpmyadmin для удобной работы.
