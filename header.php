<?php
error_reporting(0);
ob_start();

  include "/libs/session.php";
  Session::init();
  Session::checkSession();
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/libs/Database.php");
  include_once ($filepath."/helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });

  //creating object of classes
  $db = new Database();
  $fm = new Format();
  $pc = new PostComment();
  $ex = new Exam();

?>

<?php
//code for cache-control
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Western Laboratory School">
    <meta name="author" content="wls">

    <title>Western Laboratory School</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- main css file -->
    <link rel="stylesheet" href="assets/css/main.css">
     <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- tinymce script -->
    <script src="assets/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: '#writepost'
      });
    </script>
    <!-- Custom JavaScript -->
    <script src="assets/js/obls.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
        <!-- Navigation -->
    <header class="header_area">
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top main-menu">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
               <a class="navbar-brand" href="index.php"><i class="fa fa-university" aria-hidden="true"></i> Western Laboratory School</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                  <li><a href="index.php"><i class="fa fa-rss" aria-hidden="true"></i> Student Blog</span></a></li>
                  <?php 
                      if(!Session::get("checkusertype")){
                    ?>
                  <li><a href="createexam.php"><i class="fa fa-tasks" aria-hidden="true"></i> Create Exam</span></a></li>
                  <li><a href="examlist.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Exam Lists</span></a></li>
                  <?php } ?>
                   <?php 
                      if(Session::get("checkusertype")){
                    ?>
                  <li><a href="examlist.php"><i class="fa fa-tasks" aria-hidden="true"></i> Online Exam</span></a></li>
                  <li><a href="result.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Results</span></a></li>
                  <?php } ?>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                  <!-- /.dropdown -->
                   <?php
                if(isset($_GET['action']) && $_GET['action']=="logout"){
                        Session::destroy();
                        header("Location: login.php");
                    }
                ?>
                  <li class="dropdown">
                   <a href="#"><i class="fa fa-user fa-fw"></i> <?php echo Session::get('username');?> (<?php echo Session::get("usertype");?>)</a>
                  </li>
                  <li><a href="?action=logout" class="nav-link"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
                  <!-- /.dropdown -->
                </ul>
                <!-- End message/user action/taks -->
              </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>
   </header>
