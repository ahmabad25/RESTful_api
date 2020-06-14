<?php

require_once("connection.php");

$result = $connection->query("DELETE FROM user WHERE user_id = $user_id");
$affRows = ($connection->affected_rows > 0);

?>