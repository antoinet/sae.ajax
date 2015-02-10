<?php
  $superheroes = [
    "batman" => "Bruce Wayne",
    "superman" => "Clark Kent",
    "spiderman" => "Peter Parker",
    "hulk" => "Bruce Banner"
  ];

  header("Content-Type: text/plain");


  if (isset($_POST["whois"])) {
    $hero = strtolower($_POST["whois"]);
	if (array_key_exists($hero, $superheroes)) {
		echo $superheroes[$hero];		
	} else {
		echo "Don't know who this is :-/";
	}   
  } else {
	  echo "Something went wrong...";
  }
?>
