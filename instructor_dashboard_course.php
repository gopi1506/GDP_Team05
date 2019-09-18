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
}

.tab_name{
width:25%;
height:100%;
color:#cccccc;
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
color:#000000;
}

</style>
</head>

<body>
<div class='header'>
<h2 class ='name'>CODEWORD</h2>
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;'>Logout</h2></a>

</div>
<div class='body'>
<h1 style='color:#9d9d9d;padding-left:22px; '>Instructor Dashboard</h1>

<div class='body_main'>
<div class='tab_bar'>
<a href='instructor_dashboard.php' style='text-decoration:none;'><h3 class='tab_name'>Add Course</h3></a>
<a href='#' style='text-decoration:none;'><h3 class='tab_name active'>Course</h3></a>
<a href='instructor_dashboard_codeword.php' style='text-decoration:none;'><h3 class='tab_name'>Codeword</h3></a>
</div>
<div class='card_view_bar'></div>
  <?php
$email = $_SESSION["email"];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course where instructor_email='$email'";
$query2 = mysqli_query($db, $query) or die('error querying db');

				while($row = mysqli_fetch_array($query2))
					{
					$course_name = $row['course_name'];
					$course_code = $row['course_code'];
					$start_date = $row['start_date'];
					$end_date = $row['end_date'];
					$start_survey = $row['start_survey'];
					$end_survey = $row['end_survey'];
					$codeword_assigned = $row['published'];
					$published = "";
					$background = "";
					
					
					echo  "<div class='delete_class'>";
						echo "<div class='card_main'>";
						echo "<form action='instructor_course_detail_view.php' method='post'>";
					echo "<input type='hidden' name='course_code' value='".$course_code."'/>";
					echo "<button style='padding:0px;width:100%;margin-top:12px;border-radius: 50%;'>";
  					echo "<div class='post_header'>";
  					echo "<p class='txt_user'>".$course_name."</p>";
  					echo "<p class='txt_user_description'>Start Date: ".$start_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Date: ".$end_date."</p>";
    				echo "</div>";
					echo "<div class='card_content'>";
  					echo "<p class='txt_title'>Acknowledged: </p>";
  					echo "<p class='txt_title'>Start Link: ".$start_survey."</p>";
  					echo "<p class='txt_title'>End Link: ".$end_survey."</p>";
  					if($codeword_assigned == 'false'){
  						$published = "Not assigned";
  						$background = "red";
  					}else{
  						$published = "Assigned";
  						$background = "green";
  					}//end of if else statement
  					
  					echo "<p class='txt_title' style='background:".$background.";text-align:center;padding:3px 0px;'>".$published."</p>";
  					echo "</div>";
  					
  					
 					echo "<div class='box'></div>";

 					echo "</div>";
 					echo "</button>";
 					echo "</form>";
					echo "</div>";
					
								
					}//end of while loop


?>
</div>
</div>
</body>
</html>
