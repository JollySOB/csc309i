<?php
//TO DO: change the way the user provides input on client maybe to make it easier
	include("header.php");
	require_once("libchart/classes/libchart.php");
	
	//Make a request to find the distribution of ideas across all categories
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, 'http://localhost/csc309i/api.php');
	$request_response1 = curl_exec($curl);
	curl_close($curl);
	$request_results1 = json_decode($request_response1, true);
	
	//Interpret the request results
	if (isset($request_results1['health'])) {
		$health = $request_results1['health'];
	}
	else {
		$health = 0;
	}
	
	if (isset($request_results1['technology'])) {
		$technology= $request_results1['technology'];
	}
	else {
		$technology = 0;
	}
	
	if (isset($request_results1['finance'])) {
		$finance = $request_results1['finance'];
	}
	else {
		$finance = 0;
	}
	
	if (isset($request_results1['energy'])) {
		$energy = $request_results1['energy'];
	}
	else {
		$energy = 0;
	}
	
	if (isset($request_results1['entertainment'])) {
		$entertainment = $request_results1['entertainment'];
	}
	else {
		$entertainment = 0;
	}
	
	//Make a graph based on the retrieved results
	$graph = new VerticalBarChart();
	$data_set = new XYDataSet();
	$data_set->addPoint(new Point("health", $health));
	$data_set->addPoint(new Point("technology", $technology));
	$data_set->addPoint(new Point("finance", $finance));
	$data_set->addPoint(new Point("energy", $energy));
	$data_set->addPoint(new Point("entertainment", $entertainment));
	$graph->setDataSet($data_set);
	$graph->setTitle("Ideas By Category");
	$graph->render("assets/img/idea_distribution.png");
	
	try {
		//Makes request of the api to find top_k_ideas using input from the page's HTML form.
		if (isset($_GET['request_parameter_string'])) {
			$request_parameters = explode(' ', trim($_GET['request_parameter_string']));
			
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_URL, 'http://localhost/csc309i/api.php?start_date=' . $request_parameters[0] . '&end_date=' . $request_parameters[1] . '&limit=' . $request_parameters[2]);
			$request_response2 = curl_exec($curl);
			$request_results2 = json_decode($request_response2, true);
			curl_close($curl);
		}
	}
	
	catch (Exception $e) {
	
		if ($e->getCode == 42000) {
			
		}
	
		else {
			report_error($e);
		}
		
	}
?>
<div id="graph">
	<img src="assets/img/idea_distribution.png"/>
</div>
<div id="top_ideas">
	<h4>Find the most popular start up ideas over any range of time!</h4>
	<h6>Please use the input format shown in the box below, entering the start date first, the end date second, and the number of ideas to return</h6>
	<form action="stats.php" method="get">
		<input type="text" name="request_parameter_string" id="date_field" placeholder="YYYY-MM-DD YYYY-MM-DD k">
		<input type="submit" value="Search" class="btn">
	</form>
	<ul>
		<?php
			if (isset($request_results2)) {
				foreach($request_results2 as $key => $value) {
		?>
				<li>
					<a href="idea.php?id=<?=$value?>"><?=$key?></a>
				</li>
				</br>
		<?php
				}
			}
		?>
	</ul>
</div>