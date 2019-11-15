<?php
session_start();
?>
<?php
$codewordset_code = $_POST['codewordset'];
$codeword = array();

function is_anagram($string_1, $string_2) 
{ 
    if (count_chars($string_1, 1) == count_chars($string_2, 1)) 
        return 'yes'; 
    else 
        return 'no';        
} 





$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from ".$codewordset_code."";
$query2 = mysqli_query($db, $query) or die('error querying db');

while($row = mysqli_fetch_array($query2))
{
$codeword[] = $row['codeword'];

}//end of while loop


for($i=0;$i < count($codeword); $i++ ){

$similarity = Array();
$anagram = Array();

$similarity[] = $codeword[$i];
    for($j=$i;$j < count($codeword); $j++ ){

        if($i != $j){

        $a = similar_text($codeword[$i],$codeword[$j],$percent);
        if($percent >= 65)       
        {
            $similarity[] = $codeword[$j];
        }//end of similarity check

            $b = is_anagram($codeword[$i], $codeword[$j]);
        if($b == "yes"){
            echo $codeword[$i]."---------->".$codeword[$j]."--------------->".$b."<br>";
        }
        }//end of if condition


    }//end of inner for loop
    if(count($similarity) > 1){
        print_r($similarity);
        }
}//end of outer for loop



 









?>