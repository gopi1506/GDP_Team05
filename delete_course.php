<?php
session_start();
?>
<?php
error_reporting(0);

$course_code = $_POST['course_code'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "drop table ".$course_code."";
$query1 = "delete from course where course_code='$course_code'";

$query2 = mysqli_query($db, $query) or die('error querying db');
$query33 = mysqli_query($db, $query1) or die('error querying db');


include('instructor_dashboard.php');
echo " <script>alert('Sucesssfully Deleted Course');</script>  ";


?>