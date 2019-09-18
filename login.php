<?php
session_start();
?>
<?php
error_reporting(0);
?>
<html>
<head>
<title>LogIn</title>
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
height:40%;
padding-top:30px;
}
.mini-header{
width:100%;
height:20%;
background:#282828;
}
.mini-body{
width:100%;
height:80%;
background:#3500D3;
}
.form_input{
width:80%;
height:15%;
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
<h2 style='color:#fff;padding-top:10px;'>LOGIN</h2>
</div>
<div class='mini-body'>

<form action='login_form.php' method='post'>
<input type='email' placeholder='Email' name='email' class='form_input' required/><br>
<input type='password' placeholder='Password' name='password' class='form_input' required/><br>
<input type='submit' value='LogIn' style='background:#282828;color:#fff;width:30%;height:15%;margin:6px 0px 6px 0px;'/>
</form>
<a href='#' style='text-decoration:none;float:left;'><h4 style='color:#fff;margin:0px;padding-left:20px;'>Forgot Password ?</h4></a>

<a href='index.php' style='text-decoration:none;float:right;'><h4 style='color:#fff;margin:0px;padding-right:20px;'>Not existing user ? Sign Up </h4></a>

</div>



</div></center>



</div>








</body>
</html>
