<?php
include("library.php");

$current_id = $_GET['id'];
$db = connect_db();
$statement = $db->prepare("DELETE FROM ideas WHERE id = ?");
$statement->execute(array($current_id));
var_dump("current_id");
header("Location: response_page.php?redirect=profile.php&message=Idea successfully deleted. Click below to return to your profile page.");
exit;
?>