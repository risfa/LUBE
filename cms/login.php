<?php 
@session_start();
include 'connect.php'; 


if(isset($_POST['Login'])){

$Username = $_POST['username'];
$Password = $_POST['password'];

$logins = mysqli_query($con,"SELECT * FROM tb_admin WHERE username ='$Username' AND password = '$Password'");
$hasil = mysqli_num_rows($logins);
// echo "BABAQ".$hasil[0];
if($hasil > 0){
  $user = mysqli_fetch_array($logins);

  $_SESSION['username'] = $user['username'];
  $_SESSION['id_admin'] = $user['id_admin'];
    // echo "<script>alert('yes')</script>";
    echo "<script>document.location.href='index.php?menu=index'</script>";
  }
  else{
    echo "<script>alert('Kombinasi username dan Password tidak ditemukan')</script>";
    echo "<script>document.location.href='login.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from blackrockdigital.github.io/startbootstrap-sb-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 05:08:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS - Login dr.lube</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <!-- <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label> -->
              </div>
            </div>
            <input type="submit"  value="Login" name="Login" class="btn btn-primary btn-block">
            
          </form>
          <div class="text-center">
            <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
            <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>


<!-- Mirrored from blackrockdigital.github.io/startbootstrap-sb-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jan 2019 05:08:49 GMT -->
</html>
