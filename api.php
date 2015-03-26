 <?php
require_once("library.php");

function find_top_k_ideas($date_start, $date_end, $k) {
	$db = connect_db();
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
	$statement = $db->prepare("SELECT id, title FROM ideas WHERE created >= ? AND created <= ? ORDER BY score DESC LIMIT ?");
	$statement->execute(array($date_start, $date_end, intval($k, 10)));
	$result_set = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result_set;
}



//Determine the distribution of ideas by category and send the graph data in JSON format
if (!isset($_GET['start_date'])) {
	$db = connect_db();
	$results = $db->query("SELECT category, COUNT(*) FROM ideas GROUP BY category");
	$graph_data = "{";
	foreach($results as $row) {
		$graph_data = $graph_data . "\"" . $row['category'] . "\":" . $row['COUNT(*)'] . ",";
	}
	$graph_data = substr($graph_data, 0, strlen($graph_data) - 1);
	$graph_data = $graph_data . "}";
	header("Content-Type: JSON");
	echo $graph_data;
}

//Client is requesting top k ideas
if (isset($_GET['start_date'])) {
	$top_k_ideas = find_top_k_ideas($_GET['start_date'], $_GET['end_date'], $_GET['limit']);
	$response = "{";
	foreach($top_k_ideas as $idea) {
		$response = $response . "\"" . $idea['title'] . "\"" . ":" . $idea['id'] . ',';
	}
	$response = substr($response, 0, strlen($response) - 1);
	$response = $response . "}";

	header("Content-Type: JSON");
	echo $response;
}


?>
