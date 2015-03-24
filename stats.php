<?php
	include("header.php");
	require("library.php");
	
	if (isset($_GET['date_range'])) {
		$dates_and_rank= explode(' ', trim($_GET['date_range']));
		$search_results = top_5($dates_and_rank[0], $dates_and_rank[1], $dates_and_rank[2]);
	}
?>

<div id="top_ideas">
	<h4>Find the most popular start up ideas over any range of time!</h4>
	<h6>Please use the input format shown in the box below, entering the start date first and the end date second</h6>
	<form action="stats.php" method="get">
		<input type="text" name="date_range" id="date_field" placeholder="YYYY-MM-DD YYYY-MM-DD Topx">
		<input type="submit" value="Search" class="btn">
	</form>
	<ul>
		<?php
			if (isset($search_results)) {
				foreach($search_results as $result_row) {
		?>
				<li>
					<a href="idea.php?id=<?=$result_row['id']?>"><?=$result_row['title']?></a>
				</li>
		<?php
				}
			}
		?>
	</ul>
</div>