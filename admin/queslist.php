<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/exam.php');
	
	$usr = new Exam();
?>
<?php
if(isset($_GET['delques'])){
	$quesNo = $_GET['delques'];
	$delques =$usr->delQuestion($quesNo);
	}
 ?>
<style>
table.tbl_one{
margin:0 auto;
width:830px;}

table.tbl_one tr th{
background:#888;
color:#fff;
padding:3 32px;
text-shadow:1px 1px 2px #000;}

table.tbl_one tr:nth-child(2n+1){
background-color:#e5e5e5;
height:30px;}

table.tbl_one tr td a{
color:#009dda;
text-decoration:none}

table.tbl_one tr td a:hover{
color:#003972;
text-decoration:none;}


table.tbl_one tr:nth-child(2n){
background-color:#ddd;
height:30px;}

</style>
<div class="main">
<h1>Question List</h1>
 <?php
if(isset($delques)){
	echo $delques;
	}
 ?>
<table class="tbl_one">
	<tr>
    <th width="10%">No</th>
    <th width="70%">Question</th>
    <th width="20%">Action</th>
    </tr>
<?php
	$userdata = $usr->getQueByOrder();
	if($userdata){
		$i=0;
		while($result = $userdata->fetch_assoc()){
			$i++;
?>
	<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $result['ques']; ?></td>
    <td>

<a onclick="return confirm('Are You Sure To Remove this User');" href="?delques=<?php echo $result['id']; ?>">Remove</a></td>
    </tr>
   <?php } } ?>
</table>


	
</div>
<?php include 'inc/footer.php'; ?>