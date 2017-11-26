<?php
include_once "header.php";
if (isset($_GET['pid'])) {
	$postId = $_GET['pid']; 
}else{
	header("Location: index.php");
}
?>
<section class="singlepost clearfix">
      <div class="container obls_border obls_margin">
        <div class="row obls_padding">
          <div class="col-md-8" id="postdetails" style="background:#fff">
	          <!-- Blog Post -->
	          <?php
	          	$singlepost = $pc->getSinglePost($postId);
	          	if ($singlepost) {
	          	while ($row = $singlepost->fetch_assoc()) {
	          	
	          ?>
	            <div class="card-body">
	              <h2 class="card-title"><?php echo $row['title'];?></h2>
	              <?php if (!$row['image']=="") {  ?>
	              		<div class="post_img">
	              			<img class="card-img" src="<?php echo $row['image'];?>">
	              		</div>
	            <?php 	} 	?>
	             <?php if (isset($row['description'])) {  ?> 
	              <div class="card-text"><?php echo $row['description'];?></div>
	              <?php  } 	?>
	            </div>
	            <hr>
	            <div class="card-footer text-muted">
	              Posted on <?php echo $fm->formatdate($row['pdate']);?> by
	              <a href="#"><?php echo $row['username'];?></a>
	              | Subject:<a href="#"><?php echo $row['name'];?></a>
	            </div>

	         <?php
	         	//end while loop 
	     			}
	          	}else{
	          		echo "<span class='error'>Post not found !</span>";
	          	}
	          ?>
	          <hr>
	          <!-- Commenting system start -->
	          <?php
	          	$username = Session::get("username");

	          	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postcomment'])) {
				        $comment = $pc->commentPost($_POST, $postId , $username);
				    }

	          ?>
	          <!-- comment form -->
	          <form class="form-inline" action="" method="POST">
    			  <textarea name="comment" cols="73" class="form-control" placeholder="write your comment"></textarea>
			      <input type="submit" name="postcomment" class="btn btn-primary" value="Comment"/>
			  </form>
			  <hr>
	          <div class="commentdesign">
	          	<?php
	          		$getcomment = $pc->getSinglePostComment($postId);

	          		if($getcomment){
	          			$countc = $getcomment->num_rows;
	          			echo "<span style='color:#2c3e50;font-size:18px;'>".$countc." Comments</span><hr>";
	          			while ($row = $getcomment->fetch_assoc()) {
	          			
	          		?>
					<div class="row">
					<div class="col-sm-1">
						<div class="thumbnail">
						<img class="img-responsive user-photo" src="assets/img/user.png">
						</div><!-- /thumbnail -->
					</div><!-- /col-sm-1 -->

					<div class="col-sm-8">
						<div class="panel panel-default">
						<div class="panel-heading">
						<strong><?php echo $row['username'];?></strong> <span class="text-muted">says</span>
						</div>
						<div class="panel-body">
						<?php echo $row['comment'];?>
						</div><!-- /panel-body -->
						</div><!-- /panel panel-default -->
					</div><!-- /col-sm-5 -->
				</div>

         		<?php	
	          			}
	          		}else{
	          			echo "<span style='color:#2c3e50;font-size:18px;'>0 Comment</span><hr>";
	          		}
	          	?>
				
	      	 </div>
          </div>
          <?php
          // sidebar
          include_once "sidebar.php";
          ?>
        </div>
      </div>
    </section>

<?php
include_once "footer.php";
?>