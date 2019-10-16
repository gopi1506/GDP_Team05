<?php
session_start();
?>
<?php
error_reporting(0);
$email = $_SESSION["email"];
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');

$query = "insert into admin(email,ack) values ('$email','false')";
$query2 = mysqli_query($db, $query);

include 'student_dashboard.php';
?>