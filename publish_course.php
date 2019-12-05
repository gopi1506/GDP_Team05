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

                            if($codewordscount > $studentpercent){
                                $query7 = "UPDATE course SET published ='true' where course_code='$course_code'";
                                $query9 = mysqli_query($db, $query7) or die('error querying db');
                                
                                //start of while loop for codeword

                                $query20 = "select * from ".$codewordset_key."";
                                $query21 = mysqli_query($db, $query20) or die('error querying db');
                                while($row = mysqli_fetch_array($query21))
                                 {
                                    $codeword = $row['codeword'];
                                    $temp[] = $codeword;
                                   // print_r($temp);
                                 }
                                // end of while loop for codeword

                                //start of while loop for students

                                $query22 = "select * from ".$course_code."";
                                $query23 = mysqli_query($db, $query22) or die('error querying db');
                                while($row = mysqli_fetch_array($query23))
                                {
                                    $email1 = $row['email'];
                                   // echo $email1;
                                    $codeword1 = $row['codeword'];
                                   // if($codeword1 != ""){   
                                       // echo "checking ";    
                                        $inc = rand ( 0 , count($temp)) ;  
                                  //  $check[] = 

                                     
                                        $query24 = "UPDATE ".$course_code." SET codeword ='".$temp[$inc]."' where email='$email1'";
                                        $query25 = mysqli_query($db, $query24) or die('error querying db');
                                        //$inc = $inc + 1;
                                    //}//end of if statement to check for codeword


                                }
                                // end of while loop for students


                                include 'instructor_dashboard.php';


                            }else{

                                echo "<script>alert('Need more codewords to publish');</script>";
                                include 'instructor_dashboard.php';

                            }//end of nested-if-else statement
                            
                           //end of if statement

                        }else{

                            echo "<script>alert('You need to select codewordset to publish course');</script>";
                           
                            include 'instructor_dashboard.php';
                            
                        }//end of if-else statement


                        
                    }//end of while loop





?>