<?php
    // Performs a call to the flickr API, gets the most recent pictures
    // and returns them as JSON

    $json = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photos.getRecent&per_page=500&extras=url_sq&api_key=286a91389f0175f572466c707ba85df9&format=json&nojsoncallback=1");

    header("Content-Type: application/json");
    echo $json;

?>