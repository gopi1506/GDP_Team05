<?php
session_start();
?>
<?php

$course_code = $_POST['course_code'];
$name = $_POST['name'];
$email = $_POST['email'];


echo $course_code.$name.$email;

?>
