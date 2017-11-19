<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	$exm = new Exam();
?>

<style>
	input[type="text"],input[type="email"],input[type="number"]{
border:1px solid #d5d5d5;
margin:6px;
min-height:20px;
margin-left:10px;
width:285px;
padding:5px;
}
</style>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$addQue = $exm->addQuestions($_POST);
	}
	//Get Total
	$total = $exm->getTotalRows();
	$next  = $total+1;
?>
<div class="main">
<h1>Admin Panel- Add Question</h1>
<?php
	if (isset($addQue)){
		echo $addQue;
	}
?>
	<div class="adminpanel">
		<form action="" method="post">
			<table>
				<tr>
					<td width="162">Question No</td>
					<td width="19">:</td>
					<td width="461"><input type="number" value="<?php
						if(isset($next)){
							echo $next;
						}
					?>" name="quesNo"/></td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td><input type="text" name="ques" placeholder="Enter Question...." required /></td>
				</tr>

				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter Question...." required /></td>
				</tr>

				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter Choice Two...." required /></td>
				</tr>

				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter Choice Three...." required /></td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter Choice Four...." required /></td>
				</tr>

				<tr>
					<td>Correct Ans.</td>
					<td>:</td>
					<td><input type="number" name="rightAns" required /></td>
				</tr>

				<tr>
					
					<td colspan="3" align="center">
						<input  type="submit" value="Add A Question" />
					</td>
					
				</tr>	




			</table>
		</form>
		</div>


	
</div>
<?php include 'inc/footer.php'; ?>