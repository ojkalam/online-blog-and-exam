<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/user.php');
	
	$usr = new User();
?>
<?php
if(isset($_GET['dis'])){
	$userid = $_GET['dis'];
	$dbluser =$usr->DisableUser($userid);
	}
 ?>
 <?php
if(isset($_GET['ena'])){
	$userid = $_GET['ena'];
	$enluser =$usr->EnableUser($userid);
	}
 ?>
 
  <?php
if(isset($_GET['del'])){
	$userid = $_GET['del'];
	$delluser =$usr->RemoveUser($userid);
	}
 ?>
<style>
table.tbl_one{
margin:0 auto;}

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
<h1>User List</h1>

 <?php
if(isset($dbluser)){
	echo $dbluser;
	}
 ?>
  <?php
if(isset($enluser)){
	echo $enluser;
	}
 ?> 
   <?php
if(isset($delluser)){
	echo $delluser;
	}
 ?> 
<table class="tbl_one">
	<tr>
    <th width="126">No</th>
    <th width="248">Name</th>
    <th width="174">Username</th>
    <th width="275">Email</th>
    <th width="264">Action</th>
    </tr>
<?php
	$userdata = $usr->getAllUser();
	if($userdata){
		$i=0;
		while($result = $userdata->fetch_assoc()){
			$i++;
?>
	<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $result['name']; ?></td>
    <td><?php echo $result['username']; ?></td>
    <td><?php echo $result['email']; ?></td>
    <td>
    <?php 
	if($result['status'] == '0'){
	?>
<a onclick="return confirm('Are You Sure To Disable this User');" href="?dis=<?php echo $result['id']; ?>">Disable</a> ||

    <?php }else{ ?>
<a onclick="return confirm('Are You Sure To Enable this User');" href="?ena=<?php echo $result['id']; ?>">Enable</a> ||
<?php } ?>
<a onclick="return confirm('Are You Sure To Remove this User');" href="?del=<?php echo $result['id']; ?>">Remove</a></td>
    </tr>
   <?php } } ?>
</table>


	
</div>
<?php include 'inc/footer.php'; ?>