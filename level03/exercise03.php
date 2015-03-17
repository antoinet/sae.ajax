<?php
    // adds artificial delay to AJAX requests.

    sleep(1);
    http_response_code(200);

    sleep(1);    
    header('X-blip: blap');

    sleep(1);
    echo "blup";

?>