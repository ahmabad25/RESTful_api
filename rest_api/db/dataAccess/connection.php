<?php

//Host, Username, Password, DB
$connection = new mysqli("localhost", "root", "", "rest_api");
if ($connection->connect_errno) {
	echo "Connection failed: %s\n", $connection->connect_error;
	exit();
}

?>