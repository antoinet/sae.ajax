<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SAE Ajax Course - Level 3 - Exercise 7</title>
    <style type="text/css">
      body { font-family: Arial, Helvetica, sans-serif; }
    </style>

    <script type="text/javascript">
        function send_ajax_request() {
            
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    
                    json = JSON.parse(xhr.responseText);
                    
                    var photos = json.photos.photo;
                    for (i = 0; i < photos.length; i++) {
                        
                        var photo = photos[i];
                        
                        var img = document.createElement("img");
                        img.src = photo.url_sq;
                        img.title = photo.title;
                        
                        document.body.appendChild(img);
                        
                    }
                }
            }
            
            xhr.open("GET", "exercise07.php");
            xhr.send();
        }
    </script>

  </head>
  <body>
    <input type="button" onclick="send_ajax_request()" value="AJAX">           
      
  </body>
</html>
