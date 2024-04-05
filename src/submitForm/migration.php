<?php
require(__DIR__ . '/../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$db_handler_class = new db_handler();

$dbHost = $_ENV["DB_HOST"];
$dbUsername = $_ENV["DB_LOGIN"];
$dbPassword = $_ENV["DB_PASSWORD"];
$dbName = $_ENV["DB_BASE_NAME"];
$filePath = 'sql/project_1.sql';

$db_function_class->restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath);