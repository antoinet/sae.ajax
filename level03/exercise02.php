<?php
    // returns a random HTTP status code upon every call

    $status_codes = array(200, 302, 304, 400, 401, 403, 404, 418, 500, 505);
    $status = $status_codes[array_rand($status_codes)];
    
    http_response_code($status);
    
?>