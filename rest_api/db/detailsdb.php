<?php
include "helper/response.php";

/*1. Ambil data dari request*/
$user_id = isset($_GET["id"]) ? $_GET["id"] : "";

//Rules & Validation
$rules = "/^\d{1,4}$/"; //Penjelasan ada di phpliveregex.com
$valid = preg_match($rules, $user_id, $match);

$data = null;
$httpStatus = 400;
if($valid) {
	/*2. Ambil atau filter data dari resource(file, db)*/
	include "./dataAccess/getOne.php";
	$httpStatus = $result ? 200 : 500;
/*	if($result) {
		$httpStatus = 200;
	} else {
		$httpStatus = 500;
	}*/
}

/*3. Set header*/
header("Access-Control-Allow-Origin: *", true, $httpStatus); //Untuk membatasi akses ke API
header("Content-Type: application/json"); //Untuk reformat agar dikenali sebagai .json


/*4. Tampilkan atau kembalikan data ke consumer*/
$msg = [
	"msg" => response($valid, $data),
	"detail" => !$valid ? "user id" : ""
];
echo json_encode($msg); //Untuk merubah array $data menjadi model .json

?>