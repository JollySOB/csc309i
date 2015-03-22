<?php
require_once("library.php");
session_start();
	
if (isset($_SESSION['email'])) {

	try {
		$db = connect_db();
		$update_user_vote_status = $db->prepare("INSERT INTO user_votes VALUES(?, ?, DEFAULT)");
		$update_user_vote_status->execute(array($_SESSION['email'], $_GET['id']));
	}

	catch (Exception $e){
		if ($e->getCode() == 23000) {
		header("Location: response_page.php?redirect=browse.php&message=Sorry, you've already voted on this idea. Try browsing to find another idea to vote on!");
		exit;
		}
	}

	if ($_GET['like'] == 1) {
		$update_score = $db->prepare("UPDATE ideas SET score = (score + 1) WHERE id = ?");
		}
	else {
		$update_score = $db->prepare("UPDATE ideas SET score = (score - 1) WHERE id = ?");
	}
	$update_score->execute(array($_GET['id']));
	header("Location: response_page.php?redirect=browse.php&message=You're vote has been registered! Click below to browse more project ideas!");
}

else {
	header("Location: response_page.php?redirect=login.php&message=You're not logged in! That means you can't vote. Click below so that you can login, and vote to your heart's content!");
	exit;
}
?>