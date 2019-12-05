<?php
session_start();
?>
<?php
error_reporting(0);

$course_code = $_POST['course_code'];
$temp = array();
$check = array();
$inc = 0;

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course where course_code='$course_code'";
$query2 = mysqli_query($db, $query) or die('error querying db');
$codewordset_name = "";
                while($row = mysqli_fetch_array($query2))
                    {
                        $course_name = $row['course_name'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];
                        $start_survey = $row['start_survey'];
                        $end_survey = $row['end_survey'];
                        $published = $row['published'];
                        $acknewledged = $row['acknowledged'];
                        $codewordset_key =$row['codewordset_key'];

                        //start of if else statement
                        if($codewordset_key != "Select Codeword"){
                            $query3 = "select * from ".$codewordset_key."";
                            $query4 = mysqli_query($db, $query3) or die('error querying db');
                            $codewordscount=mysqli_num_rows($query4);
                            //echo $codewordscount;
                            $query11 = "select * from ".$course_code."";
                            $query12 = mysqli_query($db, $query11) or die('error querying db');
                            $studentcount=mysqli_num_rows($query12);
                           // echo "in select codeword";

                            $studentpercent = $studentcount + ($studentcount * (20/100));

                        }else{

                            echo "<script>alert('You need to select codewordset to publish course');</script>";
                           
                            include 'instructor_dashboard.php';
                            
                        }//end of if-else statement


                        
                    }//end of while loop





?>
