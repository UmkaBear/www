<?php
require(__DIR__ . '/../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$db_handler_class = new db_handler();
$db_handler_class->createDatabase();
