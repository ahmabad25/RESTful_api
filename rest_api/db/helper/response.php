<?php
	function response($valid, $data) {
		return ($valid ? ($data ? $data : "data tidak ada") : "input tidak valid!");
	}
?>