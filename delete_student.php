<?php
session_start();
?>
<?php
error_reporting(0);
$course_code = $_POST['course_code'];
$email = $_POST['email'];



$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
<<<<<<< HEAD
echo " <script>alert('Are you sure want to delete this student?');</script> ";

=======
>>>>>>> 071f0ba68b7c553f9c84c8b543dcd71a89ed54a9
$query = "delete from ".$course_code." where email='$email'";

$query2 = mysqli_query($db, $query) or die('error querying db 123');


include 'instructor_course_detail_view.php';

?>
