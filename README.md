## Для создания новой БД необходимо ввести url http://localhost:8500/src/submitForm/create_db.php
### Для указания имени БД в строке $sql = "CREATE DATABASE www"; меняем на свое имя.

## Для переноса таблиц из уже существующей БД нужно ввести url http://localhost:8500/src/submitForm/migration.php
### Для указания места хранения вашей БД в строке $filePath = 'SQL_BD/www.sql'; меняем на ваш путь.

## Установка phpmailer
### Запустить команду composer require phpmailer/phpmailer