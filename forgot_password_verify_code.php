<?php
session_start();
?>
<?php
$email = $_POST['email'];
$code = $_POST['code'];
$password = $_POST['password'];
$conform_password = $_POST['conform_password'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');

if($password == $conform_password){
    
   $query = "select * from user_details where email='$email'";
$query2 = mysqli_query($db, $query) or die('error querying db 1');

while($row = mysqli_fetch_array($query2))
{
    
    $email = $row['email'];
    $unique_key = $row['unique_key'];
    if($unique_key == $code){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query20 = "UPDATE user_details SET password ='".$hash."' where email='".$email."'";
    $query21 = mysqli_query($db, $query20) or die('error querying db 8'); 
        
        	echo " <script>alert('Password successfully changed');</script>  ";
			include 'login.php';
        
    }else{
        
        	echo " <script>alert('Verification code wont match');</script>  ";
			include 'forgot_password_verify.php';
        
    }//if else statement for password change
    
    
}//end of while loop 
    
}else{
    
    	echo " <script>alert('Password wont match');</script>  ";
			include 'forgot_password_verify.php';
    
}//end of if else statement for password match











?>