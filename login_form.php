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
						$ack = $row['ack'];
					}
					
					if($ack == 'true'){
					
					if (password_verify($password, $password_db)) {
						

						if($email_db == $email){

							$_SESSION["email"] = $email_db; 
							$_SESSION["password"] = $password_db;
							$_SESSION["role"] =  $role_db;
							
							if($role_db == "Student"){
							include 'student_dashboard.php';
							}elseif($role_db == "Instructor"){
							include 'instructor_dashboard.php';
							}else{
							include 'admin_dashboard.php';	
							}
							
							}else{
							echo "<script>alert('Email doesnot exist');</script>";
							include 'login.php';
							
							}//end of if-else statement for password check






					}else{

						echo "<script>alert('Password Incorrect');</script>";
							include 'login.php';
					}//end of if-else statement
					
					}else{
					    echo "<script>alert('You have not verified your email please verify it!');</script>";
							include 'login.php';
					    
					}//end of checking email verification
					
					




?>