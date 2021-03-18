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
$ sudo apt install apache2
```

Также проверим изменение
``` linux
$ sudo ufw status
```
