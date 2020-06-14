<?php

require_once("connection.php");

$result = $connection->query("SELECT * FROM user WHERE user_id = $user_id");
$data = $result ? $result->fetch_assoc() : null;

?>