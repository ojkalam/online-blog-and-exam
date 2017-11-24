<?php
ob_start();

  include "/libs/session.php";
  Session::init();
  Session::checkLogin();

  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/libs/Database.php");
  include_once ($filepath."/helpers/Format.php");

  spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });

  //creating object of classes
  // $db = new Database();
  // $fm = new Format();
  $user = new User();

?>

<?php
//code for cache-control
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $userlogin = $user->userLogin($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teachers/Students Login</title>
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
</head>
<body class="loginbg">
	<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-6 col-md-offset-3">
    		<h2 class="text-center loginhead">Western Laboratory School</h2>
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Teachers/Students sign in</h3>
			 	</div>
			  	<div class="panel-body">
    				
				  <?php 
		    			if (isset($userlogin)) {
		    		?>
			    		<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <?php echo $userlogin; ?>
						</div>
		    		<?php
		    		}
		    		?>

			    	<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
                        <div class="form-group">
			    	    	<select name="user_type" class="form-control form-control-lg">
							  <option value="std">Student</option>
							  <option value="tch">Teacher</option>
							</select>
			    	    </div>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="username" name="uname" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="pass" type="password" value="">
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>