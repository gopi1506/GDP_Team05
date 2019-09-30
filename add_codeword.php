<?php
session_start();
?>
<?php
error_reporting(0);
$codewordset_name = $_POST["codeword"];
$codewordset_code = substr($codewordset_name,0,3).rand(1,100);
$created_at = date("m/d/Y");
$published = "false";
$instructor_email = $_SESSION["email"]; 


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');

   if ( isset($_FILES["file"])) {
   
   
   } else {
             echo "No file selected <br />";
     }

include 'instructor_dashboard_codeword.php';
echo " <script>alert('Successfully added course');</script>  ";

?>
