<?php
require_once("library.php");
session_start();

try {
	$db = connect_db();
	$statement = $db->prepare("INSERT INTO ideas VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
	$statement->execute(array("DEFAULT", $_POST['title'], $_SESSION['email'], "DEFAULT", $_POST['category'], $_POST['description'], $_POST['keywords'], "0"));
	$statement = $db->query("SELECT MAX(id) FROM ideas");
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$current_id = $result['MAX(id)'];
	
}

catch (Exception $e) {
		echo $e->getMessage();
		echo "Stack Trace:<br>";
		var_dump($e->getTrace());
		exit;
}

header("Location: idea.php?id=$current_id");
?>