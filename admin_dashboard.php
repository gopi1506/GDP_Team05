<?php
session_start();
?>
<?php
$email = $_SESSION["email"];
$inc = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>
    
    
    <body>
        <div class='header'>
        <!--<h2 id='name'>CODEWORD</h2>-->
        <img src="img.jpg" alt="img" style="float:center;width:200px;height:64px;">
        <a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;color:#fff;'>Logout</h2></a>
        </div>
        <div class='body'>
            <h1 style='color:#00000;padding-left:530px; '>Admin Dashboard</h1>
            <div class='body_main'>
                <div class='tab_bar'>
                    <a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Instructor Requests</h3></a>
                    <a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Managa Profiles</h3></a>
                </div>
                <div class='card_view_bar'>
                </div>
                <center>

                </center>
            </div>
        </div>
    </body>
</html>
