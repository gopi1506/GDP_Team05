<?php
session_start();
?>
<?php
$email = $_SESSION["email"];
$inc = 0;
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
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
            <a class="nav-link" href="admin_dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="admin_dashboard_codeword.php">
              <i class="material-icons">library_books</i>
              <p>Codeword</p>
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
            <a class="navbar-brand" href="#">Admin Dashboard</a>
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
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">dashboard</i>
                  </div>
                  <p class="card-category">Instructor requests pending</p>
                  <h3 class="card-title">
                  <?php
                  $db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
                  $query = "select * from admin where ack='false'";
                  $query2 = mysqli_query($db, $query) or die('error querying db');
                  $rowcount=mysqli_num_rows($query2);
                  echo $rowcount;
                  ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">library_books</i>
                  </div>
                  <p class="card-category">Number of codewordsets</p>
                  <h3 class="card-title">
                  <?php
                  $db = mysqli_connect('localhost', 'root', '', 'gdp') or die('error connecting to mysql db');
                  $query = "select * from codewordset_admin where email='$email'";
                  $query2 = mysqli_query($db, $query) or die('error querying db');
                  $rowcount=mysqli_num_rows($query2);
                  echo $rowcount;
                  ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          
          

          <div class="row">


<?php


      echo "
     
      <div class='card'>
 <div class='card-header card-header-primary'>
   <h4 class='card-title'>Instructor Request</h4>
 </div>
 <div class='card-body'>
   <div id='typography'>
<div class='card-title'>

</div>
<div class='clearfix'></div>
     <div class='row'>
<div class='card-body table-responsive'>
<table class='table'>
<thead class='text-primary'>
<th>Email</th>
<th></th>
</thead>
<tbody>";
$query3 = "select * from admin";
$query4 = mysqli_query($db, $query3) or die('error querying db');

while($row = mysqli_fetch_array($query4))
{

$email_request = $row['email'];
$ack = $row['ack'];
if($ack == "false"){
echo "<tr>";
echo "<td>".$email_request."</td>";
echo "<td>

<form method='post' action='request_accept.php'>
<input type='hidden' value='".$email_request."' name='email'/>
<button type='submit' class='btn btn-primary pull-right' id='publish'>Accept</button>
</form>


</td>";
echo "</tr>";
}//end of if statement
}//end of while loop



echo  " </tbody>
</table>
</div>

  </div>
   </div>
 </div>
</div>				
      ";


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
    </body>
</html>
