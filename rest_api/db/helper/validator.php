<?php

function validate($rules, $object) {
	$errors = [];
	$valid = true;
	foreach ($rules as $key => $value) {
		$dataToValid = isset($object->$key) ? $object->$key : "";
		$isValid = preg_match($value, $dataToValid, $match);
		if(!$isValid) {
			$valid = false;
			array_push($errors, $key);
		}
	}
	return [$errors, $valid];
}

?>