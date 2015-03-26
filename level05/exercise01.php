<?php
if (isset($_REQUEST['query'])) {
$query = $_REQUEST['query'];
$callback = $_REQUEST['callback'];
$countries = file("exercise01_countries.txt");
$result = array_map('trim', array_values(preg_grep("/^$query/i", $countries)));
header('Content-Type', 'application/json');
if ($callback) {
	echo $callback.'('.json_encode($result).')';
} else {
	echo json_encode($result);
}
}
?>