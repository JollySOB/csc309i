<?php
	include("header.php");
	require("library.php");
?>

<div id="browse_container">
	<h3>Search projects by keyword, sort by name or date, or filter them by category</h3>
	<form action="process_search.php?query_type=filter" method="get" id="filter">
		<select name="category" id="category">
				<option value="health">Health</option>
				<option value="technology">Technology</option>
				<option value="finance">Finance</option>
				<option value="energy">Energy</option>
				<option value="entertainment">Entertainment</option>
		</select>
		<input type="submit" value="Filter" class="btn">
	</form>
	<form action="process_search.php?query_type=search" method="get" id="search">
		<input type="text" name="search_query">
		<input type="submit" value="Search" class="btn">
	</form>
	<form action="process_search.php?query_type=sort" method="get" id="sort">
		<select name="name_date">
			<option value="a_to_z">By name: A To Z</option>
			<option value="z_to_a">By name: Z To A</option>
			<option value="newest">By date: Newest To Latest</option>
			<option value="oldest">By date: Latest Lo Newest</option>
		</select>
		<input type="submit" value="Sort" class="btn">
	</form>
</div>
<div id="search_results">
	<h4>Blah</h4>
	<ul>
	</ul>
</div>