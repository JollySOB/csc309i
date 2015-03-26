<?php
require_once("library.php");
session_start();

try {
	$db = connect_db();
	$current_datetime = date("Y-m-d H:i:s");
	$current_date = substr($current_datetime, 0, 10);
	$statement = $db->prepare("INSERT INTO ideas VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
	$statement->execute(array("DEFAULT", $_POST['title'], $_SESSION['email'], $current_date, $_POST['category'], $_POST['description'], $_POST['keywords'], "0"));
	$statement = $db->query("SELECT MAX(id) FROM ideas");
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$current_id = $result['MAX(id)'];	
}

catch (Exception $e) {
		report_error($e);
}

header("Location: idea.php?id=$current_id");
?>