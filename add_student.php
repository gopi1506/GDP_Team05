<?php
session_start();
?>
<?php
$email = $_SESSION["email"];
error_reporting(0);
$course_code = $_POST["course_code"];