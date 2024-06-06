## Используемые технологии

- Laravel

## Описание

Программа скачивает все данные по указанным endpoint-ам и сохраняет в БД

http://89.108.115.241:6969/api/sales?dateFrom=1800-01-01&dateTo=2024-06-06&page=14&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie
http://89.108.115.241:6969/api/orders?dateFrom=1800-01-01&dateTo=2024-06-06&page=14&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie
http://89.108.115.241:6969/api/stocks?dateFrom=2024-05-31&page=2&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie
http://89.108.115.241:6969/api/incomes?dateFrom=1800-01-01&dateTo=2024-06-06&page=1&key=E6kUTYrYwZq2tN4QEtyzsbEBk3ie

## Credentials

**Подключение к БД:** `mysql -u laravel_user -p -h 84.38.180.229 -D data_downloader`

**Пароль:** `ComplexPassword123!`

**Названия таблиц:** sales, orders, stocks, incomes

Для подключения к БД должен быть установлен mysql client `sudo apt-get install mysql-client`

## Установка и запуск проекта

`git clone https://github.com/code4-fun/data-downloader`

`cd data-downloader`

`cp .\.env.example .\.env` для Windows  
`cp ./.env.example ./.env` для Linux

Создать БД и добавить настройки подключения к ней в .env

`php artisan migrate`

`php artisan data:download`
