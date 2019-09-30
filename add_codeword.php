<?php
session_start();
?>
<?php
error_reporting(0);
$codewordset_name = $_POST["codeword"];
$codewordset_code = substr($codewordset_name,0,3).rand(1,100);
$created_at = date("m/d/Y");
$published = "false";
$instructor_email = $_SESSION["email"]; 


?>
