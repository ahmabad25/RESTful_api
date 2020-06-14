<?php
include "helper/response.php";
include "helper/validator.php";

/*1. Ambil data dari request*/
$user = json_decode(file_get_contents("php://input"));
$user_id = isset($user->user_id) ? $user->user_id : "";
$name = isset($user->name) ? $user->name : "";
$username = isset($user->username) ? $user->username : "";
$password = isset($user->password) ? $user->password : "";

//Rules & Validation
$rules = 
[
	"user_id" => "/^\d{1,4}$/",
	"name" => "/^[A-Z\s+a-z]{5,25}$/",
	"username" => "/^\w{5,25}$/",
	"password" => "/^\w{5,25}$/"
];

$validator = validate($rules, $user);
$errors = $validator[0];
$valid = $validator[1];

$affRows = false;
$httpStatus = 400;
if($valid) {
	/*2. Ambil atau filter data dari resource(file, db)*/
	include "./dataAccess/update.php";
	$httpStatus = $result ? 200 : 500;
}

/*3. Set header*/
header("Access-Control-Allow-Origin: *", true, $httpStatus);
header("Content-Type: application/json");


/*4. Tampilkan atau kembalikan data ke consumer*/
$msg = [
	"msg" => response($valid, $affRows),
	"detail" => !$valid ? $errors : ""
];
echo json_encode($msg); 

?>