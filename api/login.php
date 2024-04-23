<?php


// Заголовки
header("Access-Control-Allow-Origin: http://www/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// Файлы необходимые для соединения с БД
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
$user->userlogin = $data->userlogin;
$userlogin = $user->userlogin();
 
// Подключение файлов JWT
include_once "Config/core.php";
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/firebase/php-jwt/src/BeforeValidException.php";
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/firebase/php-jwt/src/ExpiredException.php";
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/firebase/php-jwt/src/SignatureInvalidException.php";
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/firebase/php-jwt/src/JWT.php";
use \Firebase\JWT\JWT;
 
// Существует ли электронная почта и соответствует ли пароль тому, что находится в базе данных
if ($userlogin && $user->password) {
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "id" => $user->id,
           "userlogin" => $user->userlogin,
           "password" => $user->password
       )
    );
 
    // Код ответа
    http_response_code(200);
 
    // Создание jwt
    $jwt = JWT::encode($token, $key, 'HS256');
    echo json_encode(
        array(
            "message" => "Успешный вход в систему",
            "jwt" => $jwt
        )
    );
}
 
// Сообщим пользователю, что он не может войти в систему
else {
 
  // Код ответа
  http_response_code(401);

  // Скажем пользователю что войти не удалось
  echo json_encode(array("message" => "Ошибка входа"));
}
?>