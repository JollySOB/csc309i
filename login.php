<?php include("header.php");?>

	<div class="form_container">
		<form action="process_login.php" method="post" class="log_reg_form">
			<label for="email" class="log_reg_label">Email:</label>
			<br>
			<input type="text" name="email" class="form_input" id="email">
			<br>
			<label for="password" class="log_reg_label">Password:</label>
			<br>
			<input type="text" name="password" class="form_input" id="password">
			<br>
			<br>
			<input type ="submit" value="Login" class="btn">
		</form>
	</div>