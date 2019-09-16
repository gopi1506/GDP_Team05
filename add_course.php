<?php
session_start();
?>
<?php

   if ( isset($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
         else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("student/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "student01.txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "student/" . $storagename);
            echo "Stored in: " . "student/" . $_FILES["file"]["name"] . "<br />";
            }
        }
           
     } else {
             echo "No file selected <br />";
     }

?>
