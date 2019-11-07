<?php
session_start();
?>
<?php
$codewordset_code = $_POST['codewordset'];
$codeword = array();

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from ".$codewordset_code."";
$query2 = mysqli_query($db, $query) or die('error querying db');



    }//end of inner for loop


}//end of outer for loop
