<?php
	include('header.php');
?>
<div class="form_container">
	<form action="process_edit.php" method="post">
		<label for="title">Title:</label>
		<br>
		<input type="text" name="title" id="title" class="form_input" value="<?=$_GET['title']?>">
		<br>
		<label for="category">Category:</label>
		<br>
		<select name="category" id="category" class="form_input">
			<option value="health" <?php 
										if ($_GET['category'] == 'health') {
											echo 'selected="selected"';
										}
									?>>
									Health</option>
			<option value="technology" <?php 
											if ($_GET['category'] == 'technology') {
												echo 'selected="selected"';
											}
										?>
										>Technology</option>
			<option value="finance" <?php 
										if ($_GET['category'] == 'finance') {
											echo 'selected="selected"';
										}
									?>
									>Finance</option>
			<option value="energy" <?php 
										if ($_GET['category'] == 'energy') {
											echo 'selected="selected"';
											}
									?>
									>Energy</option>
			<option value="entertainment" <?php 
												if ($_GET['category'] == 'entertainment') {
													echo 'selected="selected"';
												}
											?>
											>Entertainment</option>
		</select>
		<br>
		<label for="description">Description:</label>
		<br>
		<textarea name="description" id="description" class="form_input" placeholder="Enter the description of your idea you want other users to be able to see."><?=$_GET['description']?></textarea>
		<br>
		<label for="keywords">Keywords:</label>
		<br>
		<input type="text" name="keywords" id="keywords" value="<?=$_GET['keywords']?>" placeholder="Enter space separated search tags for your idea."class="form_input">
		<br>
		<br>
		<input type="submit" value="Submit Changes" class="btn">
		<input type="hidden" name="id" value="<?=$_GET['id']?>">
	</form>
</div>
