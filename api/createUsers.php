<?php


header("Access-Control-Allow-Origin: http://authentication-jwt/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "Config/Database.php";
include_once "Objects/User.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->rule = $data->rule;
$user->username = $data->username;
$user->userlastname = $data->userlastname;
$user->birthday = $data->birthday;
$user->userlogin = $data->userlogin;
$user->password = $data->password;
$user->email = $data->email;
$user->class = $data->class;

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

    http_response_code(200);

    echo json_encode(array("message" => "Пользователь был создан"));
} else {

    http_response_code(400);

    echo json_encode(array("message" => "Невозможно создать пользователя"));
}
