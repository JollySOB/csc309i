<?php

function connect_db() {
	try {
		$db = new PDO('mysql:host=localhost;port=3306;dbname=ideator', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}
	catch (Exception $e) {
		echo $e->getMessage();
		echo "Stack Trace:<br>";
		var_dump($e->getTrace());
		exit;
	}
}

function search($search_type, $query) {
	$db = connect_db();
	
	if ($search_type == 'filter') {
		$statement = $db->prepare("SELECT id, title FROM ideas WHERE category = ?");
		$statement->execute(array($query));
	}
	
	else if ($search_type == 'sort') {
		$statement = $db->query("SELECT id, title FROM ideas ORDER BY $query");
	}
	
	else {
		$statement = $db->prepare("SELECT id, title FROM ideas WHERE title LIKE '%$query%' OR keywords LIKE '%$query%'");
		$statement->execute(array($query, $query));
	}
	
	$result_set = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result_set;
}

function searchl($query_term, $search_type) {
	$db = connect_db();
	if ($search_type == '')
	$result_set = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result_set;
}

?>