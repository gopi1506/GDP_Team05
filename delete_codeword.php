<?php
session_start();
?>
<?php
error_reporting(0);

$codewordset_code = $_POST['codewordset_code'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "drop table ".$codewordset_code."";
$query1 = "delete from codewordset where codewordset_code='$codewordset_code'";

$query2 = mysqli_query($db, $query) or die('error querying db 123');
$query33 = mysqli_query($db, $query1) or die('error querying db ');


include('instructor_dashboard_codeword.php');
echo " <script>alert('Sucesssfully Deleted Course');</script>  ";


?>