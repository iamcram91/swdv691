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
                <li class=""><a href="index.html">Omega Steel</a></li>
                <li class="active"><a href="inventory.php">Inventory</a></li>
                <li class=""><a href="login.php">Log In/Regsiter | Log Out</a></li>

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
?>

<div class="spacer"></div>

<div class="img-container">

    <img src="img/main/secondary-logo.png" alt="Omega Steel">

</div>

<div class="container">
    
    <h2>Inventory Program</h2>

    <div class="spacer"></div>

</div>


<div style="width:80%; margin:0 auto;">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Grade</th>
                <th>Footage</th>
                <th>Outer Diameter</th>
                <th>Wall</th>
                <th>Manufacturer</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = mysqli_connect("us-cdbr-iron-east-01.cleardb.net", "b997011d0ae7bf", "f098c1a8", "heroku_f017db3f113916c");
            // Check connection
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                $page_no = $_GET['page_no'];
                } else {
                    $page_no = 1;
                    }

                $total_records_per_page = 10;
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2"; 

                $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `inventory`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1

                $result = mysqli_query($con,"SELECT * FROM `inventory` LIMIT $offset, $total_records_per_page");
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>".$row['id_inventory_grade']."</td>
                            <td>".$row['footage']."</td>
                            <td>".$row['outer_diameter']."</td>
                            <td>".$row['wall']."</td>
                            <td>".$row['manufacturer']."</td>
                            <td>".$row['location']."</td>
                        </tr>";
                    }
                mysqli_close($con);
                ?>
        </tbody>
    </table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
        if ($total_no_of_pages <= 10){  	 
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
                    }else{
            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
            }
        }
        elseif($total_no_of_pages > 10){
            
        if($page_no <= 4) {			
        for ($counter = 1; $counter < 8; $counter++){		 
                if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
                    }else{
            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
            }
            echo "<li><a>...</a></li>";
            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
            }

        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
            echo "<li><a href='?page_no=1'>1</a></li>";
            echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
            if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
                    }else{
            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }                  
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                }
            
            else {
            echo "<li><a href='?page_no=1'>1</a></li>";
            echo "<li><a href='?page_no=2'>2</a></li>";
            echo "<li><a>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
            echo "<li class='active'><a>$counter</a></li>";	
                    }else{
            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }                   
                    }
                }
        }
    ?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>

</div>
</body>
</html>