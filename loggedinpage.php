<?php
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Marc Kirksey | Omega Project</title>

    <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/index-responsive.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

    <!-- Application Icon-->
    <link rel="icon" href="/img/main/omega-logo-nav.png">


  </head>

<body>
<div class="container">

    <nav class="navbar navbar-inverse navbar-fixed-top">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://omega-s1.herokuapp.com/index.html"><img src="img/main/omega-logo-nav.png" width="25" height="25" class="d-inline-block align-top" alt="Omega Steel Logo" role="img" aria-label="Omega Steel logo - inventory lookup"></a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=><a href="index.html">Omega Steel</a></li>
                <li class=><a href="inventory.php">Inventory</a></li>
                <li class="active"><a href="login.php">Log In/Regsiter | Log Out</a></li>

            </ul>
        </div>

    </nav>

</div>
<!--/.nav-collapse -->	

<?php

    session_start();
    //$invetoryContent="";

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
      
    } else {
        
        header("Location: login.php");
        
    }

	//include("header.php");

?>

<div class="spacer"></div>
<div class="img-container">
    <img src="img/main/secondary-logo.png" alt="Omega Steel">
</div>

<div class="container" id="containerLoggedInPage">
  <div class="row justify-content-md-center">
    <div class="col col-sm-4"></div>
    <div class="col col-sm-4">
        <h2>Connected Login Page</h2>
    </div>
    <div class="col col-sm-4"></div>
</div>  

<div class="container" id="containerLoggedInPage">
  <div class="row justify-content-md-center">
    <div class="col col-sm-4">
    </div>
    <div class="col col-sm-4">
    <a href ='login.php?logout=1'>
        <button class="button" type="submit">Logout</button></a>
    </div>
    <div class="col col-sm-4">
    </div>
</div>  

<?php
    
    include("footer.php");
?>

</body>
<!--/end of body tag -->

</html>