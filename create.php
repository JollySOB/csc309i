<?php 
include("header.php");
require_once("library.php");
?>

<div class="form_container">
	<form action="process_create.php" method="post">
		<label for="title">Title:</label>
		<br>
		<input type="text" name="title" id="title" class="form_input" >
		<br>
		<label for="category">Category:</label>
		<br>
		<select name="category" id="category" class="form_input">
			<option value="health">Health</option>
			<option value="technology">Technology</option>
			<option value="finance">Finance</option>
			<option value="energy">Energy</option>
			<option value="entertainment">Entertainment</option>
		</select>
		<br>
		<label for="description">Description:</label>
		<br>
		<textarea name="description" id="description" class="form_input" placeholder="Enter the description of your idea you want other users to be able to see."></textarea>
		<br>
		<label for="keywords">Keywords:</label>
		<br>
		<input type="text" name="keywords" id="keywords" placeholder="Enter space separated search tags for your idea."class="form_input">
		<br>
		<br>
		<input type="submit" value="Create" class="btn">
	</form>
</div>

