<?php
session_start();
?>
<?php
// Login Form
error_reporting(0);
$email = $_POST['email'];
$password = $_POST['password'];




$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from user_details where email='$email'";
$query2 = mysqli_query($db, $query) or die('error querying db');

				while($row = mysqli_fetch_array($query2))
					{
						$email_db = $row['email'];
						$password_db = $row['password'];
						$role_db = $row['role'];					
					}
					
					
					
					
if($email_db == $email && $password_db == $password){

$_SESSION["email"] = $email_db; 
$_SESSION["password"] = $password_db;
$_SESSION["role"] =  $role_db;

if($role_db == "Student"){
include 'student_dashboard.php';
}else{
include 'instructor_dashboard.php';
}

}else{
echo "<script>alert('Email or Password wont match');</script>";
include 'login.php';

}



?>
