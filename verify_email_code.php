<?php
session_start();
?>
<?php

$email = $_POST['email'];
$code = $_POST['code'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from user_details where email='$email'";
$query2 = mysqli_query($db, $query) or die('error querying db');

				while($row = mysqli_fetch_array($query2))
					{
					    $email1 = $row['email'];
					    $ack = $row['ack'];
					    $unique_key = $row['unique_key'];
					    
					    if($ack == 'false'){
					        
					     if($code == $unique_key){   
					        
					       $query15 = "UPDATE user_details SET ack ='true' where email ='".$email."'";
                            $query16 = mysqli_query($db, $query15) or die('error querying db 8'); 
                             echo "<script>alert('Account Created');</script>";
							include 'login.php'; 
                            
					     }else{
					         echo "<script>alert('You have entered wrong verification code');</script>";
							include 'verify_email.php'; 
					         
					     }//end of nested if-else statement
					        
					    }else{
					        echo "<script>alert('You have already verified your email');</script>";
							include 'login.php'; 
					        
					    }//
					    
					    
					    
					}//end of while loop











?>
