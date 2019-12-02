<?php
session_start();
?>
<?php
error_reporting(0);

$codewordset_code = $_POST['codewordset_code'];
$codeword_name = '';
$created_at = '';
$published = '';


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "UPDATE codewordset_admin SET published ='true' where codewordset_code='$codewordset_code'";
$query9 = mysqli_query($db, $query) or die('error querying db 1');

$query = "select * from codewordset_admin where codewordset_code = '".$codewordset_code."'";
$query2 = mysqli_query($db, $query) or die('error querying db 2');
                while($row = mysqli_fetch_array($query2))
                    {
                        $codeword_name = $row['codewordset_name'];
                        $created_at = $row['created_at'];
                        $published = $row['published'];
                    }//end of while loop


$query = "select * from user_details";
$query2 = mysqli_query($db, $query) or die('error querying db 3');
                while($row = mysqli_fetch_array($query2))
                    {
                       $email = $row['email'];
                       $role = $row['role'];
                        if($role == 'Instructor'){
                            $query10 = "insert into codewordset(codewordset_name,codewordset_code,created_at,instructor_email,published) values ('$codeword_name','$codewordset_code','$created_at','$email','$published')";
                            $query11 = mysqli_query($db, $query10) or die('error querying db');
                        }//end of if statement


                    }//end of while loop

include 'admin_dashboard_codeword.php';

?>