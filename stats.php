<?php
//TO DO: change the way the user provides input on client maybe to make it easier
	include("header.php");
	//TO DO: write try catch to capture when users don;t supply input with proper format
	if (isset($_GET['request_parameter_string'])) {
		//echo $_GET['request_parameter_string'];
		$request_parameters = explode(' ', trim($_GET['request_parameter_string']));
		//echo var_dump($request_parameters);
		//Use the PHP curl library to send the request
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, 'http://localhost/csc309i/api.php?start_date=' . $request_parameters[0] . '&end_date=' . $request_parameters[1] . '&limit=' . $request_parameters[2]);
		$request_response = curl_exec($curl);
		curl_close($curl);
		$request_results= json_decode($request_response, true);
		//echo var_dump($request_results);
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
			if (isset($request_results)) {
				foreach($request_results as $key => $value) {
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