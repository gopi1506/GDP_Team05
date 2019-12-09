<?php
session_start();
?>
<?php
error_reporting(0);
$dups = array();
$length_check = array();
$i = 0;
$name_inc = 0;
$instructor_email = $_SESSION["email"]; 
$codewordset_name = $_POST["codeword"];
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from codewordset where instructor_email='".$instructor_email."'";
$query2 = mysqli_query($db, $query) or die('error querying db');
                while($row = mysqli_fetch_array($query2))
                    {
                        $name = $row['codewordset_name'];

                        if($name == $codewordset_name){
                            $name_inc += 1;
                        }//end of if statement


                    }//end of while loop

if($name_inc == 0){


$codewordset_code = substr($codewordset_name,0,3).rand(1,100);
$created_at = date("m/d/Y");
$published = "false";

if(preg_match("/.txt/",$_FILES["file"]["name"])){


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
 			 $line = strtoupper(fgets($myfile));
              $arra_stud_detai = $keywords = preg_split("/[,]+/", $line);
              
            
              
                if(strlen(trim($arra_stud_detai[0])) >= 3  ){
              $query8 = "select * from $codewordset_code";
              $query9 = mysqli_query($db, $query8) or die('error querying db');
                              while($row = mysqli_fetch_array($query9))
                                  {
                                    $codeword11 = $row['codeword'];
                                    
                                    if($arra_stud_detai[0] == $codeword11){

                                     $i += 1;
                                     $dups[] = $arra_stud_detai[0];
                                    }
                                  }//end of inner while loop
                                 
                        if($i == 0){          
 			 $query5 = "insert into ".$codewordset_code."(codeword,assign) values ('$arra_stud_detai[0]','false')";
             $query6 = mysqli_query($db, $query5);
            
            }//end of if statement
        }else{
            $length_check[] = $arra_stud_detai[0];
        }//end of length check array if-else
        $i = 0;
                }//end of while loop   

                
			fclose($myfile);
			if (!unlink("codeword/".$storagename)) {
 				
			} else {
  			
				}
            
            }
        }
     } else {
             echo "No file selected <br />";
     }
     include 'hardrules_report.php';
    echo " <script>alert('Successfully added codeword');</script>  ";
    
}else{
          include 'instructor_dashboard_add_codeword.php';
        echo " <script>alert('File not supported');</script>  ";
    
}//chedcling file format
    
    }else{
        include 'instructor_dashboard_codeword.php';
        echo " <script>alert('Codewordset name should be unique');</script>  ";

    }//end of if-else statement



?>