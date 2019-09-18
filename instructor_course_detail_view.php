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
background:#59af50;
margin-bottom:12px;
}
.name{
margin:0px;
padding:22px 22px 0px 10px;
color:#fff;
float:left;
}
.body{
width:90%;
height:85%;
margin:0px auto;
background:#dcedc8;
}
.body_header{
width:100%;
height:15%;
background:#59af50;
}
.top{
width:100%;
height:60%;
}
.bottom{
width:100%;
height:40%;
}
input{
height:40px;
border:1px;
color:#fff;
}
.body_main{
width:100%;
height:85%;
padding-left:12px;
}



</style>
</head>
<body>
<div class='header'>
<h2 class ='name'>CODEWORD</h2>
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;'>Logout</h2></a>
</div>
<div class='body'>
<div class='body_header'>
<?php
$course_code = $_POST['course_code'];
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course where course_code='$course_code'";
$query2 = mysqli_query($db, $query) or die('error querying db');

				while($row = mysqli_fetch_array($query2))
					{
						$course_name = $row['course_name'];
						$start_date = $row['start_date'];
						$end_date = $row['end_date'];
						$start_survey = $row['start_survey'];
						$end_survey = $row['end_survey'];
						$published = $row['published'];
						$acknewledged = $row['acknowledged'];
						$codewordset_key =$row['codewordset_key'];
						$acknowledged =$row['acknowledged'];
						
						echo "<div class='top'>";
						echo "<h3 style='margin:0px;padding:14px 20px 0px 12px;font-size:30px;color:#fff;float:left;'>".$course_name."</h3>";
						if($published == 'false'){
						echo "
						<div style='float:right;'>
							<form method='post' style='float:left;margin:14px 12px 0px 0px;'>
							<input type='hidden' value=''/>
							<input type='submit' value='Assign Codewords' style='background:#3c7a38;' />
							</form>
						";
						echo "
							<form method='post' style='float:left;margin:14px 12px 0px 0px;'>
							<input type='hidden' value=''/>
							<input type='submit' value='Edit Course' style='background:#286c94;'/>
							</form>
						";					
						}
						echo "
							<form action='delete_course.php' method='post' style='float:left;margin:14px 12px 0px 0px;'>
							<input type='hidden' value='".$course_code."' name='course_code'/>
							<input type='submit' value='Delete Course' style='background:#7b1d16;'/>
							</form>
						</div>
						";
						
						
						echo "</div>";
						
						echo "<div class='bottom'>";
						echo "<h5 style='margin:0px;padding:14px 20px 0px 12px;color:#fff;font-size:16px;'>Start date: ".$start_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Date: ".$end_date."</h5>";
						
						echo "</div>";
							
						echo "</div><!-- End of body header -->";
						
						echo "<div class='body_main'>";
						
						if($codewordset_key == 'Select Codeword'){
						echo "<h2>Codeword Set: Not Assigned</h2>";
						}else{
						echo "<h3>".$codewordset_key."</h3>";
						}
						
						echo "<div style='background:#fff;margin:0px auto;width:80%;height:12%;border-radius:7%;padding:20px 20px 0px 20px;'>";
						echo "<h3 style='padding-right:30px;float:left;'>Acknowledged: ".$acknowledged."</h3>";
						if($start_survey == null){
						echo "<h3 style='float:left;padding-right:30px;'>Start Survey: Not Assigned</h3>";
						}
						if($end_survey == null){
						echo "<h3 style='float:left;padding-right:30px;'>End Survey: Not Assigned</h3>";
						}else{
						echo "<h3 style='float:left;padding-right:30px;'>Start Survey: ".$start_survey."</h3>";
						echo "<h3 style='float:left;padding-right:30px;'>End Survey: ".$end_survey."</h3>";
						}
						
						
						echo "</div>";
						
						
						echo "<table style='width:80%;margin:0px auto;padding-top:12px;border:1px solid;'>";
						echo "
						<tr>
						<td style='border:1px solid;'>Student Name</td>
						<td style='border:1px solid;'>Student Email</td>
						</tr>
						";
						
						$query3 = "select * from ".$course_code;
						$query4 = mysqli_query($db, $query3) or die('error querying db');

				while($row = mysqli_fetch_array($query4))
					{
						
						$name = $row['full_name'];
						$email = $row['email'];
						echo "<tr>";
						echo "<td style='border:1px solid;'>".$name."</td>";
						echo "<td style='border:1px solid;'>".$email."</td>";
						echo "</tr>";
					}//end of inner while loop	
						echo "</table>";
						
						echo "</div>";	
					}//end of while loop
  ?>
</body>
</html>
