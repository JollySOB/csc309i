<?php
include("header.php");
require_once("library.php");
$name = $_SESSION['name'];
$email = $_SESSION['email'];

$db = connect_db();
$statement = $db->query("SELECT * FROM ideas WHERE creator = '$email'");
?>

<div id="profile_content">
	<h1>Welcome back <?=$name?>!</h1>
	<h2>Create, update, or delete your start up ideas!</h2>
	<a id="create_button" class="btn" href="create.php">Create</a>
	<div id="profile_ideas">
		<h3>My Startup Ideas</h3>
		<ul>
			<?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {?>
					<li class="idea"><a href="idea.php?id=<?=$row['id']?>"><?=$row["title"]?></a></li>
			<?php 
			} 
			?>
		</ul>
	</div>
</div>
