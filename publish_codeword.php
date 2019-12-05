<?php
session_start();
?>
<?php
error_reporting(0);

$codewordset_code = $_POST['codewordset_code'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "UPDATE codewordset SET published ='true' where codewordset_code='$codewordset_code'";
$query9 = mysqli_query($db, $query) or die('error querying db');
include 'instructor_dashboard_codeword.php';

?>