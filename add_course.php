<?php
session_start();
?>
<?php
error_reporting(0);
$course_name = $_POST["course"];
$date = $_POST["date"];

$date_split = $keywords = preg_split("/['\s-\s']+/", $date);

$course_code = substr($course_name,0,3).rand(1,100);

$start_date = $date_split[0];
$end_date = $date_split[1];
$codewordset_key = $_POST["codeword"];
$start_survey = $_POST["start"];
$end_survey = $_POST["end"];
$created_at = date("m/d/Y");
$published = "false";
$instructor_email = $_SESSION["email"]; 
$acknowledged = 0;

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');


   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //if file already exists
             if (file_exists("student/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "student01".$_SESSION["email"].".txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "student/" . $storagename);
            $query = "insert into course(course_name,course_code,start_date,end_date,codewordset_key,start_survey,end_survey,created_at,published,instructor_email,acknowledged) values ('$course_name','$course_code','$start_date','$end_date','$codewordset_key','$start_survey','$end_survey','$created_at','$published','$instructor_email','$acknowledged')";
			$query2 = mysqli_query($db, $query);
			
			$query3 = "CREATE TABLE $course_code(full_name VARCHAR(30) NOT NULL,email VARCHAR(50),ack VARCHAR(30))";
			if (mysqli_query($db, $query3)) {
   				
			} else {
   				
					}
			
            $myfile = fopen("student/".$storagename, "r") or die("Unable to open file!");
			while(!feof($myfile)) {
 			 $line = fgets($myfile);
 			 $arra_stud_detai = $keywords = preg_split("/[,]+/", $line);
 			 $query5 = "insert into ".$course_code."(full_name,email,ack) values ('$arra_stud_detai[0]','$arra_stud_detai[1]','false')";
			 $query6 = mysqli_query($db, $query5);
				}
			fclose($myfile);
			if (!unlink("student/".$storagename)) {
 				
			} else {
  			
				}
            
            }
        }
     } else {
             echo "No file selected <br />";
     }

include 'instructor_dashboard.php';
echo " <script>alert('Successfully added course');</script>  ";




?>
