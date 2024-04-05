<?php   

use Dotenv\Dotenv;
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class db_handler{

    private $sqldb;
    private $sqldb_username;
    private $sqldb_password;
    private $database;
    private $connect;   

    public $row;

    function __construct(){
        $this->sqldb = $_ENV["db_host"];
        $this->sqldb_username = $_ENV["db_login"];
        $this->sqldb_password = $_ENV["db_password"];
        $this->database = $_ENV["db_database"];
        $this->connect = mysqli_connect($this->sqldb, $this->sqldb_username, $this->sqldb_password, $this->database);
        
    }

    public function sent_email(){
    
    }

    public function save_update_student(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

        $a_name = $_POST['username'];
        $a_lastname = $_POST['userlastname'];
        $a_date = $_POST['birthday'];
        $a_email = $_POST['email'];
        $a_class = $_POST['class'];
        $query = "update `users` set `username`='$a_name',`userlastname`='$a_lastname',`birthday`='$a_date',`email`='$a_email',`class`='$a_class' where `id` = '$id'";
        $result = mysqli_query($this->connect, $query);
        header('Location:../../pages/workplace.php');
        }
    }
    public function update_student()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "select * from `users` where `id` = '$id'";
            $result = mysqli_query($this->connect, $query);
            $row = mysqli_fetch_assoc($result);
            
        }
        return $row;
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
        $sql = "INSERT INTO `users` (`rule`, `username`, `userlastname`, `birthday`, `userlogin`, `password`, `email`, `class`) VALUES ('$rule', '$username', '$userlastname', '$birthday', '$userlogin', '$password', '$email', '$class')";
        $result = mysqli_query($this->connect, $sql);
        header('Location:../../index.php');
    }
    public function loginUser(){
        $userlogin = $_POST["userlogin"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connect, $query);
        $row = mysqli_fetch_assoc($result);
        $check_user = mysqli_query($this->connect, "SELECT * FROM `users` WHERE `userlogin` = '$userlogin' AND `password` = '$password'");
        if (mysqli_num_rows($check_user) > 0) {
            header("Location:../../pages/workplace.php?id=" . $row['id'] . "");
        } else {
            header('Location:../../index.php');
        }
        
    }

    public function show_teacher(){
        $query = "SELECT teachers.*, COUNT(students.id) as student_count
        FROM USERS AS teachers
        LEFT JOIN USERS AS students 
        on students.class = teachers.class
        where teachers.rule = 'Педагог' AND students.rule = 'Студент'
        GROUP BY teachers.id";
        $result = mysqli_query($this->connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['rule'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['userlastname'] . '</td>';
                echo '<td>' . $row['birthday'] . '</td>';
                echo '<td>' . $row['class'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['student_count'] . '</td>';
                echo '<td><a href="update_student.php?id=' . $row['id'] . '">Изменить</a></td>';
                echo '<td><a href="delete_students.php?id=' . $row['id'] . '">Удалить</a></td>';
                echo '</tr>';
            }
        } 
    }

    public function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
    {

        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        $templine = '';


        $lines = file($filePath);

        $error = '';


        foreach ($lines as $line) {

            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            $templine .= $line;


            if (substr(trim($line), -1, 1) == ';') {

                if (!$db->query($templine)) {
                    $error .= 'Ошибка<b>' .
                        $templine . '</b>": ' . $db->error . '<br /><br />';
                }


                $templine = '';
            }
        }
        return !empty($error) ? $error : true;
    }

    public function createDatabase()
    {
        $mysqldb = $_ENV["DB_HOST"];
        $mysqldb_username = $_ENV["DB_LOGIN"];
        $pass = $_ENV["DB_PASSWORD"];

        $conn = new mysqli($mysqldb, $mysqldb_username, $pass);

        if ($conn->connect_error) {
            die("Ошибка" . $conn->connect_error);
        }

        $sql = "CREATE DATABASE test";
        if ($conn->query($sql) === TRUE) {
            echo "Создано";
        } else {
            echo "Ошибка" . $conn->error;
        }

        $conn->close();
    }

    public function show_students(){
        $query = "SELECT students.*, teachers.userlastname AS teacher 
        FROM users AS students
        JOIN users AS teachers ON students.class = teachers.class
        WHERE students.rule = 'Студент' AND teachers.rule = 'Педагог'";
        $result = mysqli_query($this->connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['rule'] != 'Педагог') {
                    echo '<tr>';
                    echo '<td>' . $row['rule'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['userlastname'] . '</td>';
                    echo '<td>' . $row['birthday'] . '</td>';
                    echo '<td>' . $row['teacher'] . '</td>';
                    echo '<td>' . $row['class'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td><a href="update_student.php?id=' . $row['id'] . '">Изменить</a></td>';
                    echo '<td><a href="delete_students.php?id=' . $row['id'] . '">Удалить</a></td>';
                    echo '</tr>';
                }
            }
        } 
    }
    public function delete_student(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "delete FROM `users`WHERE `id` = '$id'";
            $result = mysqli_query($this->connect, $query);
            header('Location:/../pages/workplace.php');
        } else echo "Ошибка";
    }
    
    
}   