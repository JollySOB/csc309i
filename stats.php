<?php
//TO DO: change the way the user provides input on client maybe to make it easier
	include("header.php");
	require_once("assets/libchart/libchart/classes/libchart.php");
	
	try {
	
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, 'http://localhost/csc309i/api.php');
		$request_response1 = curl_exec($curl);
		curl_close($curl);
		$request_results1 = json_decode($request_response1, true);
		echo var_dump($request_results1);
		
		//Makes request of the api to find top_k_ideas using input from the page's HTML form.
		if (isset($_GET['request_parameter_string'])) {
			$request_parameters = explode(' ', trim($_GET['request_parameter_string']));
			
			//Set up and send the request
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_URL, 'http://localhost/csc309i/api.php?start_date=' . $request_parameters[0] . '&end_date=' . $request_parameters[1] . '&limit=' . $request_parameters[2]);
			$request_response2 = curl_exec($curl);
			$request_results2 = json_decode($request_response2, true);
			echo $request_response2;
			echo var_dump($request_results2);
			echo json_last_error_msg();
			curl_close($curl);
		}
		
		
	}
	
	catch (Exception $e) {
		
	}
?>

<div id="top_ideas">
	<h4>Find the most popular start up ideas over any range of time!</h4>
	<h6>Please use the input format shown in the box below, entering the start date first and the end date second</h6>
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
		<?php
				}
			}
		?>
	</ul>
</div>