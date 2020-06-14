<?php
include "helper/response.php";
/*1. Ambil data dari request*/

/*2. Ambil atau filter data dari resource(file, db)*/
include "./dataAccess/getAll.php";

/*3. Set header*/

//Untuk membatasi akses ke API
header("Access-Control-Allow-Origin: *", true, $result ? 200 : 500); 
header("Content-Type: application/json"); //Untuk reformat agar dikenali sebagai .json


/*4. Tampilkan atau kembalikan data ke consumer*/
$msg = [
	"msg" => response(true, $data),
	"detail" => ""
];

echo json_encode($data); //Untuk merubah array $data menjadi model .json

?>