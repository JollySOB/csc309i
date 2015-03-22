<?php 
	include("header.php");
	$message = $_GET['message'];
	$redirect = $_GET['redirect'];
?>

<div class="response_content">
	<p><?=$message?></p>
	<a href="<?=$redirect?>" class="nav" class="btn">Back</a>
</div>