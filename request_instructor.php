<?php
session_start();
?>
<?php
error_reporting(0);
$email = $_SESSION["email"];
<<<<<<< HEAD
=======

>>>>>>> eecf083306d3fa12abeadc2205da59c92cd9f468
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');

$query = "insert into admin(email,ack) values ('$email','false')";
$query2 = mysqli_query($db, $query);

include 'student_dashboard.php';
?>