<?php
include_once "header.php";

if (isset($_GET['exid'])) {
	$exid = $_GET['exid']; 
}else{
	header("Location: examlist.php");
}

?>

<section class="giveexam">
	<div class="container obls_border obls_margin">
		<div class="row"> 
			<div class="col-md-6 col-md-offset-3"  id="postdetails" style="margin-top:50px;text-align:center">
				<?php
					$getex= $ex->getExamById($exid);
					$getexamname = $getex->fetch_assoc();
                    $gettotal = $ex->getQuestionByExam($exid);
                    //get question by exam id
                    $getqs = $ex->getQuestionByExamId($exid);
                    if ($getqs) {
                    	 $getqs = $getqs->fetch_assoc();
                    }else{
                    	header("Location:starttest.php");
                    }
                   
				?>
				<h2>Exam Name: <strong><?php echo $getexamname['name'];?></strong></h2>
				<h3>Total Question: <?php echo $gettotal; ?></h3>
				<h3>Subject: <?php echo $getexamname['subject']; ?></h3><br>
				<div class="starttest"><a href="giveexam.php?qs=<?php echo $getqs['quesNo'];?>&&exid=<?php echo $exid; ?>"><img src="assets/img/start.jpg" alt=""></div>
			</div>
		</div>
	</div>
</section>

<?php
include_once "footer.php";
?>
