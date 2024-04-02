<?php   

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

    public function createUser(){
        $rule = $_POST["rule"];
        $username = $_POST["username"];
        $userlastname = $_POST["userlastname"];
        $birthday = $_POST["birthday"];
        $userlogin = $_POST["userlogin"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $class = $_POST["class"];

        $sql = "INSERT INTO users (rule, username,userlastname,birthday,userlogin,password,email,class) VALUES ('$rule', $username,$userlastname,$birthday,$userlogin,$password.$email.$class)";
        $registration = $this->connect->exec($sql);
    }
}   