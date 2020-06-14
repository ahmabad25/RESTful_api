<?php

require_once("connection.php");

$result = $connection->query("INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')");

?>