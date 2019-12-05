<?php
session_start();
?>
<?php

$course_code = $_POST['course_code'];
$name = $_POST['name'];
$email = $_POST['email'];
<<<<<<< HEAD
$codeword_temp = array();
$inc = 0;
error_reporting(0);
//echo $course_code.$name.$email;


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course where course_code='$course_code'";
$query2 = mysqli_query($db, $query) or die('error querying db 1');

while($row = mysqli_fetch_array($query2))
{
$published = $row['published'];
$codewordset_code = $row['codewordset_key'];
}//end of while loop

if($published == 'false'){
    $query5 = "insert into ".$course_code."(full_name,email,codeword,ack) values ('$name','$email','','false')";
    $query6 = mysqli_query($db, $query5);
}else{
// this is what happens when course is published
echo $codewordset_code;
$query7 = "select * from ".$codewordset_code."";
$query8 = mysqli_query($db, $query7) or die('error querying db 1');
while($row = mysqli_fetch_array($query8))
{

    $codeword = $row['codeword'];

    $query9 = "select * from ".$course_code."";
    $query10 = mysqli_query($db, $query9) or die('error querying db 2');
    while($row1 = mysqli_fetch_array($query10))
    {
        $codeword_stu = $row1['codeword'];
        if($codeword != $codeword_stu){
            $codeword_temp[] = $codeword;
        }//end of if statement
    }//while loop for course to access student codewords

}//while loop for codewordset code to retrive codewords

$inc = rand( 0 , count($codeword_temp)) ;

$query91 = "select * from ".$course_code." where email='$email'";
$query100 = mysqli_query($db, $query91) or die('error querying db 2');
$rowcount=mysqli_num_rows($query100);

if($rowcount == 0){

$query11 = "insert into ".$course_code."(full_name,email,codeword,ack) values ('$name','$email','".$codeword_temp[$inc]."','false')";
$query12 = mysqli_query($db, $query11);
echo "<script>alert('Student successfully added');</script>";

}else{
    echo "<script>alert('Student already exists');</script>";

}//end of if-else statement


}//end of if else statement








include 'add_student.php';

?>
=======


echo $course_code.$name.$email;

?>
>>>>>>> 071f0ba68b7c553f9c84c8b543dcd71a89ed54a9
