<?php
session_start();
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
background:#b3b3b3;
}
.name{
margin:0px;
padding:20px 20px;
color:#000000;
float:left;
}
.body{
width:100%;
height:80%;
}
.body_main{
width:100%;
height:80%;
background:#4d4d4d;
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
color:#000000;
float:left;
text-align:center;
margin:0px;
padding-top:10px;
}

.tab_name:hover{
background:#cccccc;
transition:1s ease;
}
.active{
background:#cccccc;
}

</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

</head>
<body>
<div class='header'>
<h2 class ='name'>CODEWORD</h2>
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;color:#00000;'>Logout</h2></a>
</div>

<div class='body'>
<h1 style='color:#00000;padding-left:530px; '>Instructor Dashboard</h1>

<div class='body_main'>
<div class='tab_bar'>
<a href='#' style='text-decoration:none;'><h3 class='tab_name active' >Add Course</h3></a>
<a href='instructor_dashboard_course.php' style='text-decoration:none;'><h3 class='tab_name'>Course</h3></a>
<a href='instructor_dashboard_codeword.php' style='text-decoration:none;'><h3 class='tab_name'>Codeword</h3></a>
<a href='student_dashboard.php' style='text-decoration:none;'><h3 class='tab_name'>Student Dashboard</h3></a>
</div>

<div class='card_view_bar'></div>
<center>
<!--<h2 style='color:#fff;'>Add Course</h2>-->
<?php
$current_date = date("m-d-Y");
$final_date = date('m.d.Y', strtotime('+4 month', time()));
?>


<form action='add_course.php' method='post' enctype="multipart/form-data">
<input type='text' style='width:60%;height:40px;margin-bottom:6px;' placeholder='Course Name' name='course' required/></br>
<input type='text' style='width:60%;height:40px;margin-bottom:6px;' name='daterange' value="<?php echo $current_date; ?> - <?php echo $final_date; ?>" required/></br>
<input type='file' style='width:30%;height:40px;margin-bottom:6px;' name='file' value='Upload' required/> Upload Students CSV</br>
<input type='text' style='width:60%;height:40px;margin-bottom:6px;' placeholder='Start survey link'/></br>
<input type='text' style='width:60%;height:40px;margin-bottom:6px;' placeholder='End survey link'/></br>
<select style='width:60%;height:40px;margin-bottom:6px;'>
  <option value="Select Codeword">Select Codeword</option>
</select></br>

<input type='submit' style='width:20%;height:30px;margin-bottom:5px;font-size:20px;' value='Add Course'/>

</form>
</center>
</div>
</div>
</body>
</html>
