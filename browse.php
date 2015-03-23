<?php
	include("header.php");
	require("library.php");
	
	if (isset($_GET['search_type'])) {
		$search_type = $_GET['search_type'];
		if ($search_type == 'filter') {
			$search_results = search($search_type, $_GET['category']);
		}
		
		else if ($search_type == 'sort') {
			$search_results = search($search_type, $_GET['sort_flag']);
		}
		
		else {
			$search_results = search($search_type, $_GET['search_query']);
		}
	}
?>

<div id="browse_container">
	<h3>What are you looking for?</h3>
	<form action="browse.php" method="get" id="filter">
		<select name="category" id="category">
				<option value="health">Health</option>
				<option value="technology">Technology</option>
				<option value="finance">Finance</option>
				<option value="energy">Energy</option>
				<option value="entertainment">Entertainment</option>
		</select>
		<input type="hidden" name="search_type" value="filter">
		<input type="submit" value="Filter" class="btn">
	</form>
	<form action="browse.php" method="get" id="search">
		<input type="text" name="search_query">
		<input type="hidden" name="search_type" value="search">
		<input type="submit" value="Search" class="btn">
	</form>
	<form action="browse.php" method="get" id="sort">
		<select name="sort_flag">
			<option value="title ASC">By Name: A To Z</option>
			<option value="title DESC">By Name: Z To A</option>
			<option value="created DESC">By Date: Newest To Latest</option>
			<option value="created ASC">By Date: Latest Lo Newest</option>
		</select>
		<input type="hidden" name="search_type" value="sort">
		<input type="submit" value="Sort" class="btn">
	</form>
</div>
<div id="search_results">
	<ul>
		<?php 
			if (isset($search_results) AND count($search_results) != 0) {
				echo '<h4>Look what we have here!</h4>';
				foreach ($search_results as $result_row) {
		?>
					<li><a href="idea.php?id=<?=$result_row['id']?>"><?=$result_row['title']?><a/></li>
					<br>
		<?php
				}
			}
			
			else if (!isset($search_results)) {
				echo '<h4>Search by keyword, sort by name or date, or filter by category</h4>';
			}
			
			else {
				echo '<h4>Sorry, we couldn\'t find anything matching your search terms</h4>';
			}
		?>
	</ul>
</div>