<?php
session_start();
?>
<?php
error_reporting(0);
$codewordset_code = $_POST['codewordset_code'];
$codeword = $_POST['codeword'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query1 = "delete from ".$codewordset_code." where codeword='$codeword'";

$query33 = mysqli_query($db, $query1) or die('error querying db ');

include('admin_dashboard.php');

//echo $codewordset_code."    ".$codeword;

?>