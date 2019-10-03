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

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //if file already exists
             if (file_exists("codeword/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "codeword01".$_SESSION["email"].".txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "codeword/" . $storagename);
            $query = "insert into codewordset(codewordset_name,codewordset_code,created_at,instructor_email,published) values ('$codewordset_name','$codewordset_code','$created_at','$instructor_email','$published')";
			$query2 = mysqli_query($db, $query);
			
			$query3 = "CREATE TABLE $codewordset_code(codeword VARCHAR(30) NOT NULL,assign VARCHAR(50))";
			if (mysqli_query($db, $query3)) {
   				
			} else {
   				
					}
			
            $myfile = fopen("codeword/".$storagename, "r") or die("Unable to open file!");
			while(!feof($myfile)) {
 			 $line = fgets($myfile);
 			 $arra_stud_detai = $keywords = preg_split("/[,]+/", $line);
 			 $query5 = "insert into ".$codewordset_code."(codeword,assign) values ('$arra_stud_detai[0]','false')";
			 $query6 = mysqli_query($db, $query5);
				}
			fclose($myfile);
			if (!unlink("codeword/".$storagename)) {
 				
			} else {
  			
				}
            
            }
        }
     } else {
             echo "No file selected <br />";
     }

include 'instructor_dashboard_codeword.php';
echo " <script>alert('Successfully added course');</script>  ";




?>