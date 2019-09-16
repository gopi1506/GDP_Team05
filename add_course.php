<?php
session_start();
?>
<?php

   if ( isset($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
           
     } else {
             echo "No file selected <br />";
     }

?>
