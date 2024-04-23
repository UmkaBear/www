<?php

// Заголовки
header("Access-Control-Allow-Origin: http://authentication-jwt/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Подключение к БД
// Файлы, необходимые для подключения к базе данных
include_once "Config/Database.php";
include_once "Objects/User.php";

// Получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// Создание объекта "User"
$user = new User($db);
 
// Получаем данные
$data = json_decode(file_get_contents("php://input"));
 
// Устанавливаем значения
$user->rule = $data->rule;
$user->username = $data->username;
$user->userlastname = $data->userlastname;
$user->birthday = $data->birthday;
$user->userlogin = $data->userlogin;
$user->password = $data->password;
$user->email = $data->email;
$user->class = $data->class;
 
// Создание пользователя
if (
    !empty($user->rule) &&
    !empty($user->username) &&
    !empty($user->userlastname) &&
    !empty($user->birthday) &&
    !empty($user->userlogin) &&
    !empty($user->password) &&
    !empty($user->email) &&
    !empty($user->class) &&
    $user->create()
) {
    // Устанавливаем код ответа
    http_response_code(200);
 
    // Покажем сообщение о том, что пользователь был создан
    echo json_encode(array("message" => "Пользователь был создан"));
}
 
// Сообщение, если не удаётся создать пользователя
else {
 
    // Устанавливаем код ответа
    http_response_code(400);
 
    // Покажем сообщение о том, что создать пользователя не удалось
    echo json_encode(array("message" => "Невозможно создать пользователя"));
}