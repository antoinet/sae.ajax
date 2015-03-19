<?php
    // returns the contents of a CD database in XML format

    
    $cddb = file_get_contents("exercise06.xml");
    header("Content-Type: text/xml");
    header("Content-Length: " . strlen($cddb));
    echo $cddb;
?>