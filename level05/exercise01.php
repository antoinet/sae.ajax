<?php
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    
    $countries = file("exercise01_countries.txt");
    $result = array_map('trim', array_values(preg_grep("/^$query/i", $countries)));
    
    header('Content-Type', 'application/json');
    echo json_encode($result);
}
?>