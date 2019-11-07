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
