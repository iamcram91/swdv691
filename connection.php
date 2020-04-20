<?php

    $link = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "b997011d0ae7bf", "f098c1a8", "heroku_f017db3f113916c");
        
        if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }

?>