<?php
session_start();
?>
<?php
error_reporting(0);
$course_code = $_POST['course_code'];
$email = $_POST['email'];



$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
echo " <script>alert('Are you sure want to delete this student?');</script> ";

$query = "delete from ".$course_code." where email='$email'";

$query2 = mysqli_query($db, $query) or die('error querying db 123');


include 'instructor_course_detail_view.php';

?>
