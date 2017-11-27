<?php
include_once "header.php";

if (isset($_GET['exid']) && isset($_GET['qs'])) {
	$exid = $_GET['exid']; 
	$qsno = $_GET['qs']; 
}else{
	header("Location: examlist.php");
}

	$totalqs = $ex->getQuestionByExam($exid);
	$ques = $ex->getQuestionSingleQs($exid, $qsno);
	$question = $ques->fetch_assoc();

	//process answer
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$process = $ex->processAnswer($_POST,$exid);
	}
?>
<section class="giveexam">
	<div class="container obls_border obls_margin">
		 <div class="row">
            <div class="col-md-6 examlistpad">
            	<?php 
            		$exname = $ex->getExamById($exid);
            		$exinfo = $exname->fetch_assoc();
            	?>
                <span style="font-size:24px;">Exam Name: <?php echo $exinfo['name'];?></span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <!--<a href="#" class="btn btn-danger">End Test</a>-->
                </div>
            </div>
        </div>
		<div class="row"> 

			<div class="col-md-8 col-md-offset-2"  id="postdetails">
				<h1 class="text-center">Question <?php echo $qsno; ?> of <?php echo $totalqs; ?></h1>

				<h2><?php echo $question['ques']; ?></h2>
				<form accept-charset="UTF-8" role="form" action="" method="POST">
                    <fieldset>
                    	<?php 
                    		$getans = $ex->getAns($qsno, $exid);
                    		while($ans = $getans->fetch_assoc()){
                    	?>
			    		<div class="radio">
						  <label><input type="radio" name="answer" value="<?php echo $ans['id'];?>" required><?php echo $ans['ans'];?></label>
						</div>
					<?php } ?>
						<input type="hidden" name="qsno" value="<?php echo $qsno; ?>">

			    		<input class="btn btn-success btn-block" type="submit" value="Next Question">

			    	</fieldset>
			   </form>
			</div>
		</div>
	</div>
</section>

<?php
include_once "footer.php";
?>
