<?php
session_start();
?>

<?php
$email = $_SESSION["email"];
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Student Dashboard</title>
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
          <?php
            $db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
            $query = "select * from user_details where email='$email'";
            $query2 = mysqli_query($db, $query) or die('error querying db');
            while($row = mysqli_fetch_array($query2))
            {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            echo $first_name." ".$last_name;
            }//end of while loop  
            ?>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item active  ">
              <a class="nav-link" href="student_dashboard.php">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">
                <i class="material-icons">person</i>
                <p>Request Instructor</p>
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
              <a class="navbar-brand" href="#">Student Dashboard</a>
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
                <a class="nav-link" href="logout.php">
                  <i class="material-icons">logout</i>
                  <p class="d-lg-none d-md-block">
                    Logout
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          <?php
            $db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
            $query = "select * from course";
            $query2 = mysqli_query($db, $query) or die('error querying db');
            
            while($row = mysqli_fetch_array($query2))
            {
              $course_name = $row['course_name'];
              $course_code = $row['course_code'];
              $start_date = $row['start_date'];
              $end_date = $row['end_date'];
              $start_survey = $row['start_survey'];
              $end_survey = $row['end_survey'];
              $codeword_assigned = $row['published'];
              $query3 = "select * from $course_code";
              $query4 = mysqli_query($db, $query3) or die('error querying db');
              while($row1 = mysqli_fetch_array($query4))
              {
                $email_student = $row1['email'];
                if($email_student == $email){
                  echo "
                  <div class='col-lg-6 col-md-12 col-sm-12' id='mydiv".$inc."' style='cursor: pointer;'>
                    <div class='card'>
                      <div class='card-header card-header-success'>
                        <h4 class='card-title'>".$course_name."</h4>
                        <p class='card-category' style='float:left;'>Start Date: ".$start_date."</p>
                        <p class='card-category' style='float:right;'>End Date: ".$end_date."</p>
                      </div>
                      <div class='card-body table-responsive'>
                        <table class='table'>
                          <tbody>
                            <tr>
                              <td>Start Survey</td>
                              <td>".$start_survey."</td>
                            </tr>
                            <tr>
                              <td>End Survey</td>
                              <td>".$end_survey."</td>
                            </tr>
                            <tr>
                              <td>Codeword</td>
                              <td>Not Assigned </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  ";
                }//end of if statement
              }//end of nested while loop
            }//end of outer while loop
          ?>
        </div>
      </div>
    </div>
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

/* Transition to showing the bigger shadow on hover */

.card_content:hover::after, .post_header:hover + .card_content::after{
  opacity: 1;
}

</style>
</head>
<body>
<div class='header'>
<h2 class ='name'>CODEWORD</h2>
<a href='logout.php' style='text-decoration:none;'><h2 class ='name' style='float:right;'>Logout</h2></a>

</div>
<div class='body'>
<h1 style='color:#9d9d9d;padding-left:22px; '>Student Dashboard</h1>

<div class='body_main'>

<div class='card_view_bar'>
<?php

$email = $_SESSION["email"];


$db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
$query = "select * from course";
$query2 = mysqli_query($db, $query) or die('error querying db');

while($row = mysqli_fetch_array($query2))
{
$course_name = $row['course_name'];
$course_code = $row['course_code'];
$start_date = $row['start_date'];
$end_date = $row['end_date'];
$start_survey = $row['start_survey'];
$end_survey = $row['end_survey'];
$codeword_assigned = $row['published'];

$query3 = "select * from $course_code";
$query4 = mysqli_query($db, $query3) or die('error querying db');
while($row1 = mysqli_fetch_array($query4))
{
$email_student = $row1['email'];

if($email_student == $email){


echo  "<div class='delete_class'>";
echo "<div class='card_main'>";

  echo "<div class='post_header'>";
  echo "<p class='txt_user'>".$course_name."</p>";
  echo "<p class='txt_user_description'>Start Date: ".$start_date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Date: ".$end_date."</p>";
    echo "</div>";
echo "<div class='card_content'>";
  echo "<p class='txt_title'>Codeword: </p>";
  echo "<p class='txt_title'>Start Link: ".$start_survey."</p>";
  echo "<p class='txt_title'>End Link: ".$end_survey."</p>";
 
  echo "</div>";
 
 
  echo "<div class='box'></div>";

  echo "</div>";
 
echo "</div>";





}//end of if statement

}//end of nested while loop

}//end of outer while loop

?>


</div>







</div>
</div>
</body>
</html>