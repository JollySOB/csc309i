<?php
include("header.php");
require_once("library.php");

$current_id = $_GET['id'];

$db = connect_db();
$statement = $db->prepare("SELECT * FROM ideas WHERE id = ?");
$statement->execute(array($current_id));
$result = $statement->fetch(PDO::FETCH_ASSOC);

$title = $result['title'];
$description = $result['description'];
$keywords = $result['keywords'];
$category = $result['category'];
//TO DO: add code to handle id's that don't exist which are typed into the URL bar.
?>

<div id="idea_content">
	<h1><?=$title?></h1>
	<p><?=$description?></p>
</div>

<div id="like_buttons">
	<form action="process_like.php" method="get">
		<button type="submit" id="like" name="like" value="1">Like</button>
		<button type="submit" id="dislike" name="like" value="0">Dislike</button>
		<input type="hidden" name="id" value="<?=$_current_id?>">
	</form>
	<?php
		if (isset($_SESSION['email']) AND $result['creator'] == $_SESSION['email']) {
			echo '<a id="delete_button" href="process_delete.php?id=' . $current_id . '">Delete</a>';
			echo '<a id="edit_button" href="edit.php?id=' . $current_id . '&title=' . $title. '&description=' .$description . '&keywords=' . $keywords .'&category=' . $category . '">Edit</a>';
		}
	?>
</div>
