<?php
session_start();
?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/N.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action='forgot_password_verify_code.php' method='post'>
					<span class="login100-form-logo">
						<img src="images/icons/logo.png" width="80" height="80"/>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Change Password
					</span>

				
						<input class="input100" type="hidden" name="email" placeholder="Email" value='<?php echo $email; ?>' required>
					
						<div class="wrap-input100 validate-input" data-validate="Enter Verification Code">
						<input class="input100" type="password" name="code" placeholder="Verification code" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					
					<div class="wrap-input100 validate-input" data-validate = "Enter Password">
						<input class="input100" type="password" name="password" placeholder="Password"  required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Conform Password">
						<input class="input100" type="password" name="conform_password" placeholder="Conform Password"  required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
				
				

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Change Password
						</button>
                    </div>
            
					<div class="text-center p-t-20">
					<div class="text-center p-t-20">Dont have an account ? 
                    <a class="txt1" href="index.php">
						Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>