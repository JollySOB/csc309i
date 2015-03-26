<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Share and discover start up ideas">
		<meta name="keywords" content="Startup, Business Ideas, Entrepreneur">
		<meta name="author" content="Cody Rosevear">

		<title>Ideator</title>
		
		<!-- Bootstrap Core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="templates/grayscale/css/grayscale.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="templates/grayscale/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
					<li>
						<a id="home" class="page-scroll" href="index.php">Home</a>
					</li>
					<?php
						session_start();
						if (isset($_SESSION['logged_in'])) {
							echo '<li>
									<a class="page-scroll" href="logout.php">Log Out</a>
								 </li>
								 <li>
									<a class="page-scroll" href="profile.php">My Profile</a>
								 </li>
								 <li>
									<a class="page-scroll" href="stats.php">Stats</a>
								 </li>';
						}
						else {
							echo '<li>
									<a class="page-scroll" href="login.php">Login</a>
								  </li>
								  <li>
									<a class="page-scroll" href="register.php">Register</a>
								  </li>';
						}
					?>
					<li>
						<a class="page-scroll" href="browse.php">Browse</a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
		
		