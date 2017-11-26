<?php
include_once "header.php";

	
	$examid = Session::get('examid');
	$examname = Session::get('examname');
	//var_dump($examname);

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$addQue = $ex->addQuestions($_POST, $examid);
		}

			
	//Get Total
	$total = $ex->getQuestionByExam($examid);
	$next  = $total+1;

?>
	<section id="examlist">
    <div class="container obls_margin obls_border">
        <div class="row">
            <div class="col-md-6 examlistpad">
                <span style="font-size:24px;">Exams - Add Question</span>
            </div>
            <div class="col-md-6 text-right examlistpad">
                <div class="">
                  <a href="examlist.php" class="btn btn-info">Exam List</a>
                </div>
            </div>
        </div>
     <div class="row" id="postdetails">
       <div class="col-md-12" style="padding:20px;">
	    <p style='text-align:center'>

	  	<?php
			if (isset($addQue)){
				echo "<span >".$addQue."</span>";
			}
		?>
		</p>
		<form action="" method="post">
			<table class="table table-bordered" style="width: 50%; margin:0 auto;background:#fff">
				<tr>
					<td>Total Added Question</td>
					<td>:</td>
					<td><?php if(isset($next)){
							echo ($next-1)." Questions on <strong>".$examname."</strong>";
						}
					?></td>
				</tr>
				<tr>
					<td width="">Question No</td>
					<td width="">:</td>
					<td width=""><input type="number" class="form-control" value="<?php
						if(isset($next)){
							echo $next;
						}
					?>" name="quesNo"/></td>
				</tr>
				
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ques" placeholder="Enter Question...." required /></td>
				</tr>

				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ans1" placeholder="Enter Choice one..." required /></td>
				</tr>

				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ans2" placeholder="Enter Choice Two...." required /></td>
				</tr>

				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ans3" placeholder="Enter Choice Three...." required /></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="ans4" placeholder="Enter Choice Four...." required /></td>
				</tr>

				<tr>
					<td>Correct Ans.</td>
					<td>:</td>
					<td><input class="form-control" type="number" name="rightAns" placeholder="Enter right ans no...." required /></td>
				</tr>

				<tr>
					<td></td>
					<td colspan="3">
						<input  type="submit" value="Add A Question" />
					</td>
					
				</tr>	

			</table>
			</form>
		</div>
	  </div>
	 </div>
  </section>

<?php
include_once "footer.php";
?>
