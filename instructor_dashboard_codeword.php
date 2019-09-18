<?php
session_start();
?>
<?php
error_reporting(0);
?>
<html>
<head>
<title>Instructor Dashboard</title>
<style>
body{
margin:0px;
padding:0px;
}
.header{
width:100%;
height:10%;
background:#0c0032;
}
.name{
margin:0px;
padding:22px 22px 0px 10px;
color:#240090;
float:left;
}
.body{
width:100%;
height:90%;
}
.body_main{

width:90%;
height:85%;
background:#190061;
margin:0px auto;
}
.tab_bar{
width:100%;
height:10%;
padding-bottom:5px;
}

.tab_name{
width:25%;
height:100%;
color:#fff;
float:left;
text-align:center;
margin:0px;
padding-top:10px;
}

.tab_name:hover{
background:#3500D3;
transition:2s ease;
}
.active{
background:#3500D3;
}


</style>
</head>
<body>
<div class='header'>
<!--<h2 id='name'>CODEWORD</h2>-->
<img src="img.jpg" alt="img" style="float:center;width:200px;height:64px;">
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;color:#fff;'>Logout</h2></a>

</div>
<div class='body'>
<h1 style='color:#00000;padding-left:530px; '>Instructor Dashboard</h1>

<div class='body_main'>
<div class='tab_bar'>
<a href='instructor_dashboard.php' style='text-decoration:none;'><h3 class='tab_name'>Add Course</h3></a>
<a href='instructor_dashboard_course.php' style='text-decoration:none;'><h3 class='tab_name'>Course</h3></a>
<a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Codeword</h3></a>
<a href='student_dashboard.php' style='text-decoration:none;'><h3 class='tab_name'>Student Dashboard</h3></a>
</div>
<div class='card_view_bar'></div>







</div>
</div>
</body>
</html>
