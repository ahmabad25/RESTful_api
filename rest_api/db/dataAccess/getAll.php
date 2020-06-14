<?php

require_once("connection.php");

$result = $connection->query("SELECT * FROM user");
$data = [];
if($result) {
	while($row = $result->fetch_assoc()) {
		array_push($data, $row);
	}
}
?>