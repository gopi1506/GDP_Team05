<?php
session_start();
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
                background:#59af50;
            }
            .body{
                width:100%;
                height:90%;
                background:#aed581;
            }
        </style>
    </head>
    <body>
        <div class='header'>
            <h2 id='name'>CODEWORD</h2>
        </div>
        <div class='body'>
            <center>
                <div class='signup'>
                    <div class='mini-header'>
                        <h2 style='color:#fff;padding-top:10px;'>LOGIN</h2>
                    </div>
                    <div class='mini-body'>
                        <form action='login_form.php' method='post'>
                            <input type='email' placeholder='Email' name='email' class='form_input' required/><br>
                            <input type='password' placeholder='Password' name='password' class='form_input' required/><br>
                            <input type='submit' value='LogIn' style='background:#59af50;color:#fff;width:30%;height:15%;margin:6px 0px 6px 0px;'/>
                        </form>
                        <a href='#' style='text-decoration:none;float:left;'><h4 style='color:#000;margin:0px;padding-left:20px;'>Forgot Password?</h4></a>
                        <a href='index.php' style='text-decoration:none;float:right;'><h4 style='color:#000;margin:0px;padding-right:20px;'>Don't have an account?SignUp</h4></a>
                    </div>
                </div>
            </center>
        </div>
    </body>
</html>