<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Marc Kirksey | Omega Project</title>

    <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for index page -->
    
        <link href="css/index-responsive.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet"> 
 

    <!-- JQuery JavaScript script embed-->
        <script src="http://code.jquery.com/jquery-3.4.0.min.js"   integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="   crossorigin="anonymous"></script>
   
    <!-- Jquery JavaScriptl; Mustache JavaScript; data JavaScript script embed-->
        <script type="text/javascript" src="mustache.js"></script>

        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="mustache.js"></script>
        <script type="text/javascript" src="data.js"></script>
        <script type="text/javascript" src="data_quiz.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
        <a class="navbar-brand" href="#"><img src="img/main/omega-logo-nav.png" width="25" height="25" class="d-inline-block align-top" alt="Omega Steel Logo" role="img" aria-label="Omega Steel logo - inventory lookup"></a>
    </div>

    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class=><a href="index.html">Omega Steel</a></li>
            <li class=><a href="#">Inventory</a></li>
            <li class="active"><a href="login.php">Log In/Regsiter</a></li>

        </ul>
    </div>

</nav>

</div>
<!--/.nav-collapse -->	


<?php

    session_start();

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
      
    } else {
        
        header("Location: login.php");
        
    }

	include("header.php");

?>


<!--
    <nav class="navbar navbar-light bg-faded navbar-fixed-top">
  

  <a class="navbar-brand" href="#">Secret Diary</a>

    <div class="pull-xs-right">
      <a href ='login.php?logout=1'>
        <button class="btn btn-success-outline" type="submit">Logout</button></a>
    </div>

</nav>

-->





    
<?php
    
    include("footer.php");
?>