<?php
    // load and return 10 long plaintext paragraphs of "lorem ipsum" dummy text
    // from loripsum.net

    
    $content = file_get_contents("http://loripsum.net/api/10/long/decorate/headers/link");
    header("Content-Type: text/html");
    header("Content-Length: " . strlen($content));
    echo $content;
?>