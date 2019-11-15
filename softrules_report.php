<<<<<<< HEAD
<?php
session_start();
?>
<?php
error_reporting(0);
$codewordset_code = $_POST['codewordset_code'];
$codeword = $_POST['codeword'];

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query1 = "delete from ".$codewordset_code." where codeword='$codeword'";

$query33 = mysqli_query($db, $query1) or die('error querying db ');

include('instructor_codeword_detail_view.php');
//echo " <script>alert('Sucesssfully Deleted Course');</script>  ";

echo $codewordset_code."    ".$codeword;

?>
=======
<?php
session_start();
?>
<?php
$codewordset_code = $_POST['codewordset'];
$codeword = array();

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from ".$codewordset_code."";
$query2 = mysqli_query($db, $query) or die('error querying db');

while($row = mysqli_fetch_array($query2))
{
$codeword[] = $row['codeword'];

}//end of while loop


for($i=0;$i < count($codeword); $i++ ){

    for($j=0;$j < count($codeword); $j++ ){

        if($i != $j){
            
        $a = similar_text($codeword[$i],$codeword[$j],$percent);
                echo $codeword[$i]."---------->".$codeword[$j]."--------------->".$percent;

        }//end of if condition

    }//end of inner for loop

}//end of outer for loop
?>
>>>>>>> 2b87c5c88fa74d1f0a870d24b67958f761b6f222
