<?php

/*1. Ambil data dari request*/
$user = json_decode(file_get_contents("php://input"));

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

$userArr = 
[
	"user_id" => $user->user_id,
	"nama" => $user->nama,
	"alamat" => $user->alamat,
	"hobi" => $user->hobi
];
array_push($data, $userArr);

/*3. Set header*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


/*4. Tampilkan atau kembalikan data ke consumer*/
echo json_encode($data); 

?>