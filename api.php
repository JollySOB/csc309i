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
	//echo var_dump($top_k_ideas);
}
?>
