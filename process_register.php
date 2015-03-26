<?php
	require_once("library.php");
	
	//Retrieve user input
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	//Validate input
	if ($name == '' OR $email == '' OR $password == '') {
		header("Location: response_page.php?redirect=register.php&message=Please ensure that you have filled in all of the input fields!");
		exit;
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: response_page.php?redirect=register.php&message=Please ensure that you have provided a valid e-mail address!");
		exit;
	}
	
	//Update the database with new user info.
	try {
		$db = connect_db();
		$statement = $db->prepare("INSERT INTO users VALUES(?, ?, ?)");
		$statement->execute(array($name, $email, $password));
	}
	
	
	catch (Exception $e){
		if ($e->getCode() == 23000) {
			header("Location: response_page.php?redirect=register.php&message=Sorry, the email you have provided has already been registered. Please try again with a different email address.");
			exit;
		}
		
		else {
			report_error($e);
		}
	}
	
	header("Location: process_login.php?email=$email&password=$password");
	exit;
?>