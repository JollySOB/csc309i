<?php 
	require_once("library.php");

	//Retrieve user input
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
	}
	
	else {
		$email = $_GET['email'];
		$password = $_GET['password'];
	}
	
	try {
		$db = connect_db();
		$statement = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
		$statement->execute(array($email, $password));
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		if ($result['email'] != $email OR $email == '' OR $password == '') {
			header("Location: response_page.php?redirect=login.php&message=Invalid email and password combination. Please try again.");
			exit;
		}
		else {
			session_start();
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $result['name'];
			$_SESSION['logged_in'] = 1;
			header("Location: index.php");
		}
	}
	
	catch (Exception $e) {
		echo $e->getMessage();
		echo "Stack Trace:<br>";
		var_dump($e->getTrace());
		exit;
	}
	

?>