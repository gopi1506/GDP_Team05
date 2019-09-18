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
    if($password!=$confirm_password || strlen($password) <6 ){
        include 'index.php';
        echo "<script type='text/javascript'>alert('Check Password, Password length must be greater than 5 charectors');</script>";
    }else{
        $db = mysqli_connect('localhost', 'root', 'root', 'gdp') or die('error connecting to mysql db');
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
    }
?>