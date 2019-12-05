<?php
	session_start();
?>
<?php
	//signup form
	error_reporting(0);
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$is_instructor = $_POST['is_instructor'];
	if($password != $confirm_password || strlen($password) < 6)
	{
		include 'index.php';
		echo "<script type='text/javascript'>
		document.getElementById('first_name').value = '".$first_name."';
		document.getElementById('last_name').value = '".$last_name."';
		document.getElementById('email').value = '".$email."';

		alert('Check Password, Password length must be greater than 5 charectors');
		

		</script>";
	}
	else
	{
		$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
		$query = "select * from user_details where email='$email'";
		$query2 = mysqli_query($db, $query) or die('error querying db');
		while($row = mysqli_fetch_array($query2))
		{
			$email_db = $row['email']; 					
		}
		if($email_db == $email){
		echo "<script>alert('You are already registered');</script>";
					include 'login.php';

		}
		else
		{
			if($is_instructor == null)
			{
				$role = 'Student';
			}
			else
			{
				$role = $is_instructor;
			}
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$unique = rand(100000,999999);
			
			$query = "insert into user_details(first_name,last_name,email,password,role,last_login,is_active,unique_key,ack) values ('$first_name','$last_name','$email','$hash','$role','','','$unique','false')";
			$query2 = mysqli_query($db, $query);
			
			$msg = "This is your verification code: ".$unique."";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail($email,"Codeword Email Verification",$msg);
			
			echo " <script>alert('Sucesssfully Registered check email to verify email');</script>  ";
			include 'verify_email.php';
		}//end of nested if-else condition
	}//end of if-else condition for password check
?>