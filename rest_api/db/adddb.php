<?php
include "helper/response.php";
include "helper/validator.php";

/*1. Ambil data dari request*/
$user = json_decode(file_get_contents("php://input"));
$name = isset($user->name) ? $user->name : "";
$username = isset($user->username) ? $user->username : "";
$password = isset($user->password) ? $user->password : "";

//Rules & Validation
$rules = 
[
	"name" => "/^[A-Z\s+a-z]{5,25}$/",
	"username" => "/^\w{5,25}$/",
	"password" => "/^\w{5,25}$/"
];

$validator = validate($rules, $user);
$errors = $validator[0];
$valid = $validator[1];

$result = false;
$httpStatus = 400;
if($valid) {
	/*2. Ambil atau filter data dari resource(file, db)*/
	include "./dataAccess/insert.php";
	$httpStatus = $result ? 200 : 500;
}

/*3. Set header*/
header("Access-Control-Allow-Origin: *", true, $httpStatus);
header("Content-Type: application/json");


/*4. Tampilkan atau kembalikan data ke consumer*/
$msg = [
	"msg" => response($valid, $result),
	"detail" => !$valid ? $errors : ""
];
echo json_encode($msg); 

?>