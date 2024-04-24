<?php



header("Access-Control-Allow-Origin: http://www/");
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

$user->userlogin = $data->userlogin;
$userlogin = $user->userlogin();

include_once "Config/core.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/firebase/php-jwt/src/BeforeValidException.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/firebase/php-jwt/src/ExpiredException.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/firebase/php-jwt/src/SignatureInvalidException.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/firebase/php-jwt/src/JWT.php";

use \Firebase\JWT\JWT;


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


    http_response_code(200);

    $jwt = JWT::encode($token, $key, 'HS256');
    echo json_encode(
        array(
            "message" => "Успешный вход в систему",
            "jwt" => $jwt
        )
    );
} else {

    http_response_code(401);


    echo json_encode(array("message" => "Ошибка входа"));
}
