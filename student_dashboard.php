<?php
session_start();
?>

<?php
$email = $_SESSION["email"];
error_reporting(0);
?>

<html>
<head>
<title>Student Dashboard</title>
<style>
body{
margin:0px;
padding:0px;
}
.header{
width:100%;
height:10%;
background:#59af50;
}
.name{
margin:0px;
padding:22px 22px 0px 10px;
color:#fff;
float:left;
}
.body{
width:100%;
height:90%;
}
.body_main{

width:90%;
height:85%;
background:#aed581;
margin:0px auto;
}
.tab_bar{
width:100%;
height:10%;
background:#59af50;
}

.tab_name{
width:33.33%;
height:100%;
color:#fff;
float:left;
text-align:center;
margin:0px;
padding-top:10px;
}

.tab_name:hover{
background:#85b887;
transition:2s ease;
}
.active{
background:#85b887;
}





.txt_article {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-box-orient: vertical;
   line-height: 1.4em;        /* fallback */
   max-height: 4.2em;       /* fallback */
   -webkit-line-clamp: 3; /* number of lines to show */
}

.card_main {
  width: 100%;
  margin-left:12px;
 
}


.delete_class {
  width: 18em;
  float:left;
  margin-right:12px;
}

.txt_user {
  margin: 0px 16px 8px 16px;
  padding-top: 16px;
  font-size: 120%;
}

.txt_user_description {
  margin: 0px 16px 0px 16px;
  padding-bottom: 16px;
  font-size: 80%;
}

.txt_title {
  font-size: 1.1em;
  text-align:left;

}

.txt_post_type {
  color: #ffffff;
  margin: 0px;
  font-family: roboto;
  font-weight: 400;
  padding: 8px 16px;
}

.post_header {
  color: #ffffff;
  position: relative;
  margin-top: 0px;
  width: 100%;
  box-shadow: 0px 4px 8px rgba(0,0,0,.4);
  border-radius: 8px 8px 0px 0px;
  height: auto;
  background-color: #00897B;
}


.card_image {
  margin-right: 16px;
  position: absolute;
  right: 0;
  z-index: 1;
  top: -1em;
  width: 36%;
  border-radius: 50%;
  box-shadow: 0px 4px 6px rgba(0,0,0,.5);
}

.card_content {
  position: relative;
  background: #ffffff;
  margin: 0px;
  border-radius: 0px 0px 8px 8px;
  box-shadow: 0 2px 16px rgba(0, 0, 0, 0.2);
  max-width: 100%;
  height: auto;
  padding: 4px 16px;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* Pre-render the bigger shadow, but hide it */

.card_content::after {
  box-shadow: 0 5px 15px rgba(0, 0, 0, .4);
  opacity: 0;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
  position: absolute;
  content: "";
  border-radius: 8px;
  -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* Transition to showing the bigger shadow on hover */

.card_content:hover::after, .post_header:hover + .card_content::after{
  opacity: 1;
}

</style>
</head>
<body>
<div class='header'>
<h2 class ='name'>CODEWORD</h2>
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;'>Logout</h2></a>

</div>
<div class='body'>
<h1 style='color:#9d9d9d;padding-left:22px; '>Student Dashboard</h1>

<div class='body_main'>

<div class='card_view_bar'>
<?php

$email = $_SESSION["email"];


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course";
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

$query3 = "select * from $course_code";
$query4 = mysqli_query($db, $query3) or die('error querying db');
while($row1 = mysqli_fetch_array($query4))
{
$email_student = $row1['email'];

if($email_student == $email){


echo  "<div class='delete_class'>";
echo "<div class='card_main'>";

  echo "<div class='post_header'>";
  echo "<p class='txt_user'>".$course_name."</p>";
  echo "<p class='txt_user_description'>Start Date: ".$start_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Date: ".$end_date."</p>";
    echo "</div>";
echo "<div class='card_content'>";
  echo "<p class='txt_title'>Codeword: </p>";
  echo "<p class='txt_title'>Start Link: ".$start_survey."</p>";
  echo "<p class='txt_title'>End Link: ".$end_survey."</p>";
 
  echo "</div>";
 
 
  echo "<div class='box'></div>";

  echo "</div>";
 
echo "</div>";





}//end of if statement

}//end of nested while loop

}//end of outer while loop

?>


</div>







</div>
</div>
</body>
</html>