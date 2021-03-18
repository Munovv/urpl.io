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

``` linux
$ sudo mysql_secure_installation
```

##### Плагин для валидации паролей (необязательно для тестового сервера)
``` shell
$ sudo mysql_secure_installation
```

##### Вход в MySQL
``` sudo
$ sudo mysql
```
