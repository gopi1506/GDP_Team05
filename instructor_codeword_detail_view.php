<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Codewordset View
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="assets/demo/demo.css" rel="stylesheet" />
  </head>
  
 <body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
          <?php
          $db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
 		  $query = "select * from user_details where email='$email'";
    	  $query2 = mysqli_query($db, $query) or die('error querying db');
		  while($row = mysqli_fetch_array($query2))
			{
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
          	echo $first_name." ".$last_name;
           }//end of while loop  
          ?>
        </a>
      </div>
	    
	    
    <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Course</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard_course.php">
              <i class="material-icons">content_paste</i>
              <p>Add Course</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard_codeword.php">
              <i class="material-icons">library_books</i>
              <p>Codeword</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>
 
