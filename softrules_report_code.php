<?php
session_start();
?>
<?php
$similarity_len = array();
$anagram_len = array();
$temp = 0;
?>



<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Soft Rules Report
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">

      <div class="logo">
        <a href="#" class="simple-text logo-normal">
         <!-- something comes here -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard_course.php">
              <i class="material-icons">content_paste</i>
              <p>Add Course</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard_codeword.php">
              <i class="material-icons">library_books</i>
              <p>Codeword</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="instructor_dashboard_add_codeword.php">
              <i class="material-icons">content_paste</i>
              <p>Create Codeword Set</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="student_dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Student Dashboard</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Soft Rules Report</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
           <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form"></form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link d-md-block" href="logout.php">
                    
                  <i class="material-icons">logout</i>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->


     





<?php
$codewordset_code = $_POST['codewordset'];
$codeword = array();
$codewordset_code1 = $_SESSION["codewordset_code"];


function is_anagram($string_1, $string_2) 
{ 
    if (count_chars($string_1, 1) == count_chars($string_2, 1)) 
        return 'yes'; 
    else 
        return 'no';        
} 

$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');


if($codewordset_code == NULL){
    $query = "select * from ".$codewordset_code1."";
//echo $codewordset_code;
$query2 = mysqli_query($db, $query) or die('error querying db 1');

while($row = mysqli_fetch_array($query2))
{
$codeword[] = $row['codeword'];

}//end of while loop

    
}else{

$query = "select * from ".$codewordset_code."";
//echo $codewordset_code;
$query2 = mysqli_query($db, $query) or die('error querying db 1');

while($row = mysqli_fetch_array($query2))
{
$codeword[] = $row['codeword'];

}//end of while loop

}//if else statement for redirection
?>

<div class="content">
    
   
   
<div class='col-lg-12 col-md-12 col-sm-6 pull-left'>




<?php


if($codewordset_code == NULL){
   // echo $codewordset_code1;
//start code here

echo " 

<form action='instructor_codeword_detail_view.php' method ='post'>
         
        
        <input type='hidden' value='".$codewordset_code1."' name='codewordset_code' />
        <button>Back</button>
       
        
        
        
    </form> 
     <h3>Similar codewords</h3>
    ";
    
    
   

for($i=0;$i < count($codeword); $i++ ){

    $similarity = Array();
    
    
    $similarity[] = $codeword[$i];
    //$similarity_len[] = $codeword[$i];
    
        for($j=$i;$j < count($codeword); $j++ ){
    
            if($i != $j){
    
            $a = similar_text($codeword[$i],$codeword[$j],$percent);
            if($percent >= 65)       
            {
                $similarity[] = $codeword[$j];
                $similarity_len[] = $codeword[$j];
            }//end of similarity check
    
               
            }//end of if condition
    
    
        }//end of inner for loop
    //echo count($anagram);
    
    
        if(count($similarity) > 1){
          //  print_r($similarity);
          
          echo "<div class='col-lg-12 col-md-12 col-sm-6'><table class='table-bordered  pull-left'>";
            for($k = 0 ; $k < count($similarity); $k++){
                //echo $similarity[$k];
                



//end code here

$query = "select * from codewordset_admin where codewordset_code='$codewordset_code1'";
$query2 = mysqli_query($db, $query) or die('error querying db here');
        while($row = mysqli_fetch_array($query2))
          {
            $temp += 1;

          }//end of while loop

//start changing here



if($temp == 0){
    echo " <td ><form action='softrules_report.php' method='post'>
<td><h4>".$similarity[$k]."</h4></td>
      <td ><form action='softrules_report.php' method='post'>
      <input type='hidden' name='codewordset_code' value='".$codewordset_code1."'/>
      <input type='hidden' name='codeword' value='".$similarity[$k]."'/>
      <input type='submit' class='text-danger button close' value='x'/>
      </form></td></tr>
      ";

    }

      

  }//end of for loop for retriving similar codeword

  echo "</table></div>";

  }//end of checking similarity

 

}//end of outer for loop

$temp = 0;

echo "</div>

<div class='col-lg-12 col-md-12 col-sm-6 pull-left'>
<h3>Anagram</h3>
";

for($i=0;$i < count($codeword); $i++ ){

$anagram = Array();
$anagram[] = $codeword[$i];

for($j=$i;$j < count($codeword); $j++ ){

  if($i != $j){
      $b = is_anagram($codeword[$i], $codeword[$j]);
      if($b == "yes"){
         // echo $codeword[$i]."  ".$codeword[$j];
          $anagram[] = $codeword[$j];
          $anagram_len = $codeword[$j];
      }

  }//end of if condition

}//end of inner for loop



if(count($anagram) > 1){
//print_r($anagram);

echo "<table class='table-bordered  pull-left' border='2'>";
for($k = 0 ; $k < count($anagram); $k++){
  //echo $anagram[$k];

  echo "
  <tr class='text-dark' >
<td><h4>".$anagram[$k]."</h4></td>";

while($row = mysqli_fetch_array($query2))
    {
      $temp += 1;

    }//end of while loop

    if($temp == 0){
  echo "<td >        <form action='softrules_report.php' method='post'>
<td><h4>".$anagram[$k]."</h4></td>

  <td >        <form action='softrules_report.php' method='post'>
  <input type='hidden' name='codewordset_code' value='".$codewordset_code1."'/>
  <input type='hidden' name='codeword' value='".$anagram[$k]."'/>
  <input type='submit' class='text-danger button close' value='x'/>
  </form></td>
  </tr>
  ";
    }


}//end of for loop for retriving anagram codeword
echo "</table>";



}//end of checking anagrams


}//end of outer for loop



//end of changing here


}else{

echo " 

<form action='instructor_codeword_detail_view.php' method ='post'>
         
        
        <input type='hidden' value='".$codewordset_code."' name='codewordset_code' />
        <button>Back</button>
       
        
        
        
    </form> 
     <h3>Similar codewords</h3>
    ";


//start code here

for($i=0;$i < count($codeword); $i++ ){

    $similarity = Array();
    
    
    $similarity[] = $codeword[$i];
    //$similarity_len[] = $codeword[$i];
    
        for($j=$i;$j < count($codeword); $j++ ){
    
            if($i != $j){
    
            $a = similar_text($codeword[$i],$codeword[$j],$percent);
            if($percent >= 65)       
            {
                $similarity[] = $codeword[$j];
                $similarity_len[] = $codeword[$j];
            }//end of similarity check
    
               
            }//end of if condition
    
    
        }//end of inner for loop
    //echo count($anagram);
    
    
        if(count($similarity) > 1){
          //  print_r($similarity);
          
          echo "<div class='col-lg-12 col-md-12 col-sm-6'><table class='table-bordered  pull-left'>";
            for($k = 0 ; $k < count($similarity); $k++){
                //echo $similarity[$k];
                


//end code here

$query = "select * from codewordset_admin where codewordset_code='$codewordset_code'";
$query2 = mysqli_query($db, $query) or die('error querying db here');
        while($row = mysqli_fetch_array($query2))
          {
            $temp += 1;

          }//end of while loop

//start changing here


if($temp == 0){
    echo " <td ><form action='softrules_report.php' method='post'>
<td><h4>".$similarity[$k]."</h4></td>
      <td ><form action='softrules_report.php' method='post'>
      <input type='hidden' name='codewordset_code' value='".$codewordset_code."'/>
      <input type='hidden' name='codeword' value='".$similarity[$k]."'/>
      <input type='submit' class='text-danger button close' value='x'/>
      </form></td></tr>
      ";

    }

      

  }//end of for loop for retriving similar codeword

  echo "</table></div>";

  }//end of checking similarity

 

}//end of outer for loop

$temp = 0;

echo "</div>

<div class='col-lg-12 col-md-12 col-sm-6 pull-left'>
<h3>Anagram</h3>
";

for($i=0;$i < count($codeword); $i++ ){

$anagram = Array();
$anagram[] = $codeword[$i];

for($j=$i;$j < count($codeword); $j++ ){

  if($i != $j){
      $b = is_anagram($codeword[$i], $codeword[$j]);
      if($b == "yes"){
         // echo $codeword[$i]."  ".$codeword[$j];
          $anagram[] = $codeword[$j];
          $anagram_len = $codeword[$j];
      }

  }//end of if condition

}//end of inner for loop



if(count($anagram) > 1){
//print_r($anagram);

echo "<table class='table-bordered  pull-left' border='2'>";
for($k = 0 ; $k < count($anagram); $k++){
  //echo $anagram[$k];

  echo "
  <tr class='text-dark' >
<td><h4>".$anagram[$k]."</h4></td>";

while($row = mysqli_fetch_array($query2))
    {
      $temp += 1;

    }//end of while loop

    if($temp == 0){
  echo "<td >        <form action='softrules_report.php' method='post'>
<td><h4>".$anagram[$k]."</h4></td>

  <td >        <form action='softrules_report.php' method='post'>
  <input type='hidden' name='codewordset_code' value='".$codewordset_code."'/>
  <input type='hidden' name='codeword' value='".$anagram[$k]."'/>
  <input type='submit' class='text-danger button close' value='x'/>
  </form></td>
  </tr>
  ";
    }


}//end of for loop for retriving anagram codeword
echo "</table>";



}//end of checking anagrams


}//end of outer for loop


//end of changes here
          
}//end of check for query do check



?>
</div>
    </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
 
  </script>

</body>
</html>
