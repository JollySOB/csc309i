<?php

function connect_db() {
	try {
		$db = new PDO('mysql:host=localhost;port=3306;dbname=ideator', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch (Exception $e) {
		echo $e->getMessage();
		echo "Stack Trace:<br>";
		var_dump($e->getTrace());
		exit;
	}
}

?>