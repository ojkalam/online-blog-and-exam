<?php 
include_once "admin_header.php";

?>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Update Teacher Info</a>
        </li>
      </ol>
    	 <?php

    	  if (isset($_GET['tcid'])){
                  $tcid = $_GET['tcid'] ;
            }

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		        $updated = $ad->updateTeacher($_POST, $tcid);
		        if ($updated) {
		        	echo "<span class='success' style='text-align:center;margin:10px;'>Teacher info updated successfully</span>";
		        }
		    }
		?>

		<?php
                  $single = $ad->getSingleTeacherRows($tcid);
                  if ($single) {
                    while ($row = $single->fetch_assoc()) {
                    
        ?>
		<form class="form-horizontal" action="" method="POST">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" name="name" class="form-control" id="email" value="<?php echo $row['name'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Username:</label>
		    <div class="col-sm-10">
		      <input type="text" name="uname" class="form-control" id="email" value="<?php echo $row['username'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-10"> 
		      <input type="password" name="pass" class="form-control" id="pwd" value="<?php echo $row['password'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Degree:</label>
		    <div class="col-sm-10">
		      <input type="text" name="degree" class="form-control" id="email" value="<?php echo $row['degree'];?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Phone:</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="email" value="<?php echo $row['phone'];?>">
		    </div>
		  </div>
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		      <input type="submit" class="btn btn-primary" value="Update teacher" />
		    </div>
		  </div>
		</form>
		<?php
			   	}
              }
		?>
	</div>
    <!-- /.container-fluid-->
<?php
include_once "admin_footer.php";
?>