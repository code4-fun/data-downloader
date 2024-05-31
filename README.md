## Credentials

**Подключение к БД:** `mysql -u laravel_user -p -h 84.38.180.229 -D data_downloader`

**Пароль:** `ComplexPassword123!`

**Названия таблиц:** sales, orders, stocks, incomes

Для подключения к БД должен быть установлен mysql client `sudo apt-get install mysql-client`

## Установка и запуск проекта

`git clone https://github.com/code4-fun/data-downloader`

`cd data-downloader`

Создать БД и добавить настройки подключения к ней в .env

`php artisan migrate`

`php artisan data:download`
