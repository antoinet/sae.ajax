<?php
    // adds artificial delay to AJAX requests.

    sleep(2);
    http_response_code(200);

?>