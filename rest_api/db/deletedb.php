<?php
include "helper/response.php";

/*1. Ambil data dari request*/
$user_id = json_decode(file_get_contents("php://input"));

//Rules & Validation
$rules = "/^\d{1,4}$/"; //Penjelasan ada di phpliveregex.com
$valid = preg_match($rules, $user_id, $match);

$affRows = false;
$httpStatus = 400;
if($valid) {
	/*2. Ambil atau filter data dari resource(file, db)*/
	include "./dataAccess/delete.php";
	$httpStatus = $result ? 200 : 500;
}

/*3. Set header*/
header("Access-Control-Allow-Origin: *", true, $httpStatus);
header("Content-Type: application/json");


/*4. Tampilkan atau kembalikan data ke consumer*/
$msg = [
	"msg" => response($valid, $affRows),
	"detail" => !$valid ? "user id" : ""
];
echo json_encode($msg); 

?>