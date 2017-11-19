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
			    	<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="username" name="uname" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="pass" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>