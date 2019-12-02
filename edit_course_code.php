<?php
session_start();
?>
<?php
$email = $_SESSION["email"];
error_reporting(0);
$course_code = $_POST["course_code"];
$course_name = $_POST["course"];
$start_survey = $_POST["start"];
$end_survey = $_POST["end"];
//echo $email.$course_code.$course_name.$start_survey.$end_survey;

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course where course_code='$course_code'";
$query2 = mysqli_query($db, $query) or die('error querying db 1');

while($row = mysqli_fetch_array($query2))
{
 $codekey = $row['codewordset_key'];
 
 if($codekey == 'Select Codeword'){
   $codeword_key = $_POST["codeword"];
   $query3 = "UPDATE course SET course_name ='".$course_name."' where course_code='".$course_code."'";
   $query4 = mysqli_query($db, $query3) or die('error querying db 2');
   $query5 = "UPDATE course SET start_survey ='".$start_survey."' where course_code='".$course_code."'";
   $query6 = mysqli_query($db, $query5) or die('error querying db 3');
   $query7 = "UPDATE course SET end_survey ='".$end_survey."' where course_code='".$course_code."'";
   $query8 = mysqli_query($db, $query7) or die('error querying db 4');
   $query9 = "UPDATE course SET codewordset_key ='".$codeword_key."' where course_code='".$course_code."'";
   $query10 = mysqli_query($db, $query9) or die('error querying db 5');

 }else{
    $query11 = "UPDATE course SET course_name ='".$course_name."' where course_code='".$course_code."'";
    $query12 = mysqli_query($db, $query11) or die('error querying db 6');
    $query13 = "UPDATE course SET start_survey ='".$start_survey."' where course_code='".$course_code."'";
    $query14 = mysqli_query($db, $query13) or die('error querying db 7');
    $query15 = "UPDATE course SET end_survey ='".$end_survey."' where course_code='".$course_code."'";
    $query16 = mysqli_query($db, $query15) or die('error querying db 8'); 
 }//end of if-else statement

}//end of while loop




include 'instructor_dashboard.php';

?>