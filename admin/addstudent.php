<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Register Students</a>
        </li>
      </ol>
    	 <?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $added = $ad->addStudent($_POST);
		        if ($added) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'>Student Added successfully</span>";
		        }
		    }
		?>
		<form class="form-horizontal" action="" method="POST">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="email" placeholder="Enter Full Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Username:</label>
		    <div class="col-sm-10">
		      <input type="text" name="uname" class="form-control" id="email" placeholder="Enter username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Select Class:</label>
		    <div class="col-sm-10">
		      <select name="class" class="form-control" id="">
		      	<option value="9">Class 9</option>
		      	<option value="10">Class 10</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Phone:</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="email" placeholder="Enter Phone">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<i class="fa fa-plus" aria-hidden="true"></i>
		      <input type="submit" class="btn btn-primary" value="Add student" />
		    </div>
		  </div>
		</form>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>