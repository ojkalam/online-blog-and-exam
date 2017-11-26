<?php
include_once "header.php";

	if(isset($_GET['delques'])){
		$quesNo = $_GET['delques'];
		$delques =$ex->delQuestion($quesNo);
		}

?>
	<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Exams - Questions</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="examlist.php" class="btn btn-info">Exam List</a>
                </div>
            </div>
        </div>
     <div class="row" id="postdetails">
       <div class="col-md-12" style="padding:20px;">
				<p> <?php
				if(isset($delques)){
					echo $delques;
					}
				 ?></p>

				 <?php
				 	if(isset($_GET['viewex'])){
						$exid = $_GET['viewex'];
						$exinfo = $ex->getExamById($exid);
						$exinfo = $exinfo->fetch_assoc();

				 ?>
				 <h3>Question List of <strong><?php echo $exinfo['name'];?></strong></h3>
				<table class="table table-bordered" style="background:#fff">
					
					<tr>
				    <th width="10%">No</th>
				    <th width="70%">Question</th>
				    <th width="20%">Action</th>
				    </tr>
					<?php
					//question by exam id
						$getqs = $ex->getQuestionByExamId($exid);
						if ($getqs) {
						$i=0;
						while ($row = $getqs->fetch_assoc()) {
						$i++;
					?>
					<tr>
				    <td><?php echo $i; ?></td>
				    <td><?php echo $row['ques']; ?></td>
				    <td>

				<a onclick="return confirm('Are You Sure To Remove this Question');" href="?viewex=<?php echo $exid; ?>&&delques=<?php echo $row['quesNo']; ?>">Remove</a></td>
				    </tr>
				   <?php } }else{
				   		echo "<tr><td colspan='3' class='error'>No question found !</td></tr>";

				   } } ?>
				</table>
	  	</div>
	  </div>
	 </div>
  </section>

<?php
include_once "footer.php";
?>
