<?php
require('library.php');

try {
	$db = connect_db();
	$statement = $db->prepare("UPDATE ideas SET title = ?, category = ?, description = ?, keywords = ? WHERE id = ?");
	$statement->execute(array($_POST['title'], $_POST['category'], $_POST['description'], $_POST['keywords'], $_POST['id']));
	$current_id = $_POST['id'];
	
}

catch (Exception $e) {
	report_error($e);
}

header("Location: idea.php?id=$current_id");
?>