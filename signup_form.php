<?php
session_start();
?>
<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_instructor = $_POST['is_instructor'];
<html>
    <head>
        <title>User Registaration</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Register</h2>
                <form action="signup_form.php" method="post">
                    <div>
                        <label for= "username">User Name : </label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label for= "email">Email : </label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label for= "password">Password : </label>
                        <input type="password" name="password_1">
                    </div>
                    <div>
                        <label for= "password">Confirm Password : </label>
                        <input type="password" name="password_2">
                    </div>
                    <button type="submit" name="reg_user">Submit</button>
                    <p>Already have an account<a href="login.php"><b>Log in</b></a></p>
                </form>
            </div>
        </div>
    </body>
</html>
?>