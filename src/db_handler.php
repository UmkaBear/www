<?php
$dotenv = Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv->load();

class db_handler{

    private $sqldb;
    private $sqldb_username;
    private $sqldb_password;
    private $database;
    private $connect;

    public function __construct()
    {
        $this->sqldb = $_ENV["db_host"];
        $this->sqldb_username = $_ENV["db_login"];
        $this->sqldb_password = $_ENV["db_password"];
        $this->database = $_ENV["db_database"];

        $this->connect = new PDO($this->sqldb,$this->sqldb_username,$this->sqldb_password,$this->database);
    }
}