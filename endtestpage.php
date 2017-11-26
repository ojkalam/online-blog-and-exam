<?php
include_once "header.php";

if (isset($_GET['exid']) && isset($_GET['tqs'])) {
	$exid = $_GET['exid']; 
	$totalqs = $_GET['tqs']; 
}else{
	header("Location:examlist.php");
}

$score = "";
?>

<section class="giveexam">
	<div class="container obls_border obls_margin">
		<div class="row"> 
			<div class="col-md-6 col-md-offset-3"  id="postdetails" style="margin-top:50px;text-align:center">
			<?php
				if (isset($_SESSION['score'])) {
					$score =  $_SESSION['score'];
					//unset($_SESSION['score']);
				}
			?>
			<h2><strong>Congrats !</strong> You have successfully done the test</h2>
			<h3>Exam Name: <strong style="color: #c0392b"><?php
				$exam = $ex->getExamById($exid);
				$exam = $exam->fetch_assoc();
				echo $exam['name'];
			?></strong></h3>
			<h3 style="color: #8e44ad">Total Question: <?php echo $totalqs?></h3>
			<h3 class="success">Correct Answer: <?php echo $score?></h3>
			<h3 class="error">Wrong Answer: <?php echo $totalqs-$score?></h3>
			<h3 style="color:#2980b9">Total Score: <?php echo $score; ?></h3>
			<a  class="btn btn-info" href="resultreport.php" target="_blank" >Generate Result Report</a>
			<a class="btn btn-primary" href="examlist.php">Back to Exam List</a>
			</div>

		</div>
	</div>
</section>

<?php
include_once "footer.php";
?>
