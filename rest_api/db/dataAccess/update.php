<?php

require_once("connection.php");

$result = $connection->query("UPDATE user SET name='$name', username='$username', password='$password' WHERE user_id=$user_id");
$affRows = ($connection->affected_rows > 0);

?>