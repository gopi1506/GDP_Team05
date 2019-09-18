<?php
session_start();
?>
<?php
error_reporting(0);
?>
<html>
<head>
<title>Signup</title>
<style>
body{
margin:0px;
padding:0px;
}
.header{
width:100%;
height:10%;
background:#0c0032;
}
.body{
width:100%;
height:90%;
background:#190061;
}

#name{
margin:0px;
padding:22px 0px 0px 10px;
color:#240090;
}

.signup{
width:50%;
height:60%;
padding-top:30px;
}
.mini-header{
width:100%;
height:10%;
background:#282828;
}
.mini-body{
width:100%;
height:95%;
background:#3500D3;
}
.form_input{
width:80%;
height:8%;
border:0px;
margin:8px 0px 8px 0px;
padding-left:4px;
}

</style>
</head>
<body>

<div class='header'>
<!--<h2 id='name'>CODEWORD</h2>-->
<img src="img.jpg" alt="img" style="float:center;width:200px;height:65px;">
</div>


<div class='body'>

<center><div class='signup'>

<div class='mini-header'>
<h2 style='color:#fff;padding-top:5px;'>SIGN UP</h2>
</div>
<div class='mini-body'>

<form action='signup_form.php' method='post'>
<input type='text' placeholder='First Name' name='first_name' class='form_input'required/><br>
<input type='text' placeholder='Last Name' name='last_name' class='form_input' required/><br>
<input type='email' placeholder='Email' name='email' class='form_input' required/><br>
<input type='password' placeholder='Password' name='password' class='form_input' required/><br>
<input type='password' placeholder='Confirm Password' name='confirm_password' class='form_input' required/><br>
<input type="checkbox" name="is_instructor" value='Instructor'><h5 style='margin:6px 0px 6px 0px;'> Required Instructor access ?</h5><br>
<input type='submit' value='Sign Up' style='background:#282828;color:#fff;width:30%;height:8%;margin:6px 0px 6px 0px;'/>
</form>

<a href='login.php' style='text-decoration:none;float:center;'><h4 style='color:#fff;margin:0px;'>Existing User? LogIn here</h4></a>
</div>
</div></center>
</div>
</body>
</html>
