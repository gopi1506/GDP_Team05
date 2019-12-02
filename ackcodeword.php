<?php
session_start();
?>
<?php
error_reporting(0);
$email = $_SESSION["email"];
$course_code = $_POST["course_code"];


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "UPDATE ".$course_code." SET ack ='true' where email='".$email."'";
$query9 = mysqli_query($db, $query) or die('error querying db');
include 'student_dashboard.php';






?>