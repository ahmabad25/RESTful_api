<?php

/*1. Ambil data dari request*/

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

/*3. Set header*/
header("Access-Control-Allow-Origin: *"); //Untuk membatasi akses ke API
header("Content-Type: application/json"); //Untuk reformat agar dikenali sebagai .json


/*4. Tampilkan atau kembalikan data ke consumer*/
echo json_encode($data); //Untuk merubah array $data menjadi model .json

?>