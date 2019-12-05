<?php
session_start();
?>
<?php
error_reporting(0);
$email = $_POST['email'];

$unique = rand(100000,999999);

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
 $query15 = "UPDATE user_details SET unique_key ='".$unique."' where email='".$email."'";
    $query16 = mysqli_query($db, $query15) or die('error querying db 8'); 

		$msg = "This is your verification code for forgot password: ".$unique."";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail($email,"Codeword Forgot Password",$msg);
			
			echo " <script>alert('Sucesssfully sent verification code to email');</script>  ";
			include 'forgot_password_verify.php';



?>