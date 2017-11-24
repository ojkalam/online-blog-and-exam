<?php
ob_start();

  include "/../libs/session.php";
  Session::init();
  Session::checkAdminLogin();

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../libs/Database.php");
  include_once ($filepath."/../helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "/../classes/".$class.".php";
  });

  //creating object of classes

  $admin = new Adminobls();

?>

<?php
//code for cache-control
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adminlogin'])) {
        $adminlogin = $admin->adminLogin($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin login- Western Laboratory School</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login | Western Laboratory School</div>
      <div class="card-body">
        <?php 
              if (isset($adminlogin)) {
            ?>
              <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $adminlogin; ?>
            </div>
            <?php
            }
            ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text"  name="uname" aria-describedby="emailHelp" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="Password">
          </div>

          <input type="submit" class="btn btn-primary btn-block" name="adminlogin" value="Login" />
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
