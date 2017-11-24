<?php
ob_start();

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php 
include "/../libs/session.php";
	Session::init();
  	Session::checkAdminSession();

$filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../libs/Database.php");
  include_once ($filepath."/../helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "/../classes/".$class.".php";
  });

  //creating object of classes
  $db = new Database();
  $fm = new Format();
  $ad = new Adminobls();
  $pc = new PostComment();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel- Western Laboratory School</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"><i class="fa fa-map-o" aria-hidden="true"></i> Admin Panel- Western Laboratory School</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="index.php" class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="addstudent.php" class="nav-link" href="index.html">
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            <span class="nav-link-text">Add Student</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="viewstudent.php" class="nav-link" href="index.html">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span class="nav-link-text">View Students</span>
          </a>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="addteacher.php" class="nav-link" href="index.html">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span class="nav-link-text">Add Teacher</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="viewteacher.php" class="nav-link" href="index.html">
            <i class="fa fa-eye" aria-hidden="true"></i>
            <span class="nav-link-text">View Teachers</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a href="subject.php" class="nav-link" href="index.html">
            <i class="fa fa-fw fa-bars"></i>
            <span class="nav-link-text">Subjects</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link">
            <i class="fa fa-fw fa-user"></i>Welcome: <strong><?php echo Session::get('username');?></strong></a>
        </li>
        <?php 
    	 if(isset($_GET['action']) && $_GET['action']=="logout"){
                    Session::destroy();
                    header("Location: login.php");
                }
        ?>
        <li class="nav-item">
          <a href="?action=logout" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">