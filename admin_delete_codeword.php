<?php
session_start();
?>
<?php
error_reporting(0);

$codewordset_code = $_POST['codewordset_code'];
$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');

$query = "select * from codewordset_admin where codewordset_code='$codewordset_code'";
$query2 = mysqli_query($db, $query) or die('error querying db');
                while($row = mysqli_fetch_array($query2))
                    {
                        $published = $row['published'];

                        if($published == 'false'){
                            $query = "drop table ".$codewordset_code."";
                            $query1 = "delete from codewordset_admin where codewordset_code='$codewordset_code'";
                            
                            $query2 = mysqli_query($db, $query) or die('error querying db 123');
                            $query33 = mysqli_query($db, $query1) or die('error querying db ');
                            
                            
                            include('admin_dashboard_codeword.php');
                            echo " <script>alert('Sucesssfully Deleted Codeword');</script>  ";
                            

                        }else{

                            $query = "drop table ".$codewordset_code."";
                            $query2 = mysqli_query($db, $query) or die('error querying db 123');


                            $query1 = "delete from codewordset_admin where codewordset_code='$codewordset_code'";
                            $query33 = mysqli_query($db, $query1) or die('error querying db ');

                            $query12 = "delete from codewordset where codewordset_code='$codewordset_code'";
                            $query32 = mysqli_query($db, $query12) or die('error querying db ');
                            include('admin_dashboard_codeword.php');
                            echo " <script>alert('Sucesssfully Deleted Codeword');</script>  ";

                        }//end of fi-else statement

                    }//end of while loop



?>