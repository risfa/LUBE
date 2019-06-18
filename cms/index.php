<?php 
@session_start();
include 'connect.php'; 
    $_GET['menu'] = $_GET['menu'];
    $page = $_GET['menu'];
  if(!empty($_SESSION['username'])){
      if($page == ""){
      echo"<script>document.location.href='index.php?menu=index'</script>";
      }
    }else{
      echo"<script>document.location.href='login.php'</script>";
    }
   ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from blackrockdigital.github.io/startbootstrap-sb-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 05:05:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS Dr.Lube</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php?menu=index">Dr.Lube</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
          <!-- <button class="btn btn-primary" type="button"> -->
            <!-- <i class="fas fa-search"></i> -->
            <!-- </button> -->
          </div>
        </div>
      </form>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
            <span>Hallo,<?php echo $_SESSION['username'] ?></span>

            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?menu=index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?menu=add_news">
            <i class="fas fa-file-alt"></i>
            <span>Add News</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?menu=add_gmaps">
            <i class="fas fa-map-marker-alt"></i>
            <span>Add Gmaps</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?menu=add_promo">
            <i class="fas fa-store-alt"></i>
            <span>Add Promo</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Add Data</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a href="index.php?menu=add_brand"class="dropdown-item">Add Brand</a>
            <a class="dropdown-item" href="index.php?menu=add_series">Add Series</a>
            <a class="dropdown-item" href="index.php?menu=add_type">Add Type</a>
            <a class="dropdown-item" href="index.php?menu=add_lube">Add Lube</a>
            <a class="dropdown-item" href="index.php?menu=add_fuel">Add Fuel</a>
            <a class="dropdown-item" href="index.php?menu=add_coolant">Add Coolant</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?menu=add_mix">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Mix n Match</span></a>
          </ul>

          <div id="content-wrapper">

            <div class="container-fluid">
              <?php
              switch ($_GET['menu']) {
                case 'index':
                include("home.php");
                break;
                case 'add_brand':
                include("add_brand.php");
                break;
                case 'add_series':
                include("add_series.php");
                break;
                case 'add_type':
                include("add_type.php");
                break;
                case 'add_lube':
                include("add_lube.php");
                break;    
                case 'add_mix':
                include("add_mix.php");
                break;
                case 'add_news':
                include("add_news.php");
                break;
                case 'add_fuel':
                include("add_fuel.php");
                break;
                
                case 'add_coolant':
                include("add_coolant.php");
                break;
                case 'export':
                include("export_excel.php");
                break;

                case 'add_gmaps':
                include("Add_gmaps.php");
                break;

                case 'add_promo':
                include("Promo.php");
                break;

                case'logout';
                @session_start();
                @session_destroy();
                echo"<script>document.location.href='http://joker.5dapps.com/pertamina/drlube/cms/login.php'</script>";
                break;

                default:
                include("home.php");
                break;
              }
              ?>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright © Your Website <?php echo $tahun_ini = Date('Y'); ?></span>
                </div>
              </div>
            </footer>

          </div>
          <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="index.php?menu=logout">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

        <!-- ckeditor -->
        <script src="vendor/ckeditor/ckeditor.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>

      </body>


      <!-- Mirrored from blackrockdigital.github.io/startbootstrap-sb-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 05:08:17 GMT -->
      </html>
