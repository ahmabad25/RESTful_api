<?php

/*1. Ambil data dari request*/
$index = $_GET["id"];

/*2. Ambil atau filter data dari resource(file, db)*/
$data = 
[
	[
		"user_id" => "1",
		"nama" => "Ahmad",
		"alamat" => "Tebet",
		"hobi" => "billiard"
	],
	[
		"user_id" => "2",
		"nama" => "Wira",
		"alamat" => "Tebet",
		"hobi" => "freefire"
	],
	[
		"user_id" => "3",
		"nama" => "Patra",
		"alamat" => "Tebet",
		"hobi" => "Gangguin Wira"
	]
];

$user = $data[($index-1)];

/*3. Set header*/
header("Access-Control-Allow-Origin: *"); //Untuk membatasi akses ke API
header("Content-Type: application/json"); //Untuk reformat agar dikenali sebagai .json


/*4. Tampilkan atau kembalikan data ke consumer*/
echo json_encode($user); //Untuk merubah array $data menjadi model .json

?>