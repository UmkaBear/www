<?php

class User
{
    // Подключение к БД таблице "users"
    private $conn;
    private $table_name = "users";

    // Свойства
    public $id;
    public $rule;
    public $username;
    public $userlastname;
    public $birthday;
    public $userlogin;
    public $password;
    public $email;
    public $class;

    // Конструктор класса User
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Метод для создания нового пользователя
    function create()
    {

        // Запрос для добавления нового пользователя в БД
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    rule = :rule,
                    username = :username,
                    userlastname = :userlastname,
                    birthday = :birthday,
                    userlogin = :userlogin,
                    password = :password,
                    email = :email,
                    class = :class";

        // Подготовка запроса
        $stmt = $this->conn->prepare($query);
        
        // Инъекция
        $this->rule = htmlspecialchars(strip_tags($this->rule));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->userlastname = htmlspecialchars(strip_tags($this->userlastname));
        $this->birthday = htmlspecialchars(strip_tags($this->birthday));
        $this->userlogin = htmlspecialchars(strip_tags($this->userlogin));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->class = htmlspecialchars(strip_tags($this->class));

        // Привязываем значения
        $stmt->bindParam(":rule", $this->rule);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":userlastname", $this->userlastname);
        $stmt->bindParam(":birthday", $this->birthday);
        $stmt->bindParam(":userlogin", $this->userlogin);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":class", $this->class);

        // Для защиты пароля

        // Выполняем запрос
        // Если выполнение успешно, то информация о пользователе будет сохранена в базе данных
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Здесь будет метод emailExists()
}