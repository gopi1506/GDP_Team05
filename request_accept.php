<?php
session_start();
?>
<?php
$email = $_POST['email'];
error_reporting(0);
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "UPDATE admin SET ack ='true' where email='$email'";
$query9 = mysqli_query($db, $query) or die('error querying db');

$query1 = "UPDATE user_details SET role ='Instructor' where email='$email'";
$query2 = mysqli_query($db, $query1) or die('error querying db');

include 'admin_dashboard.php';
?>