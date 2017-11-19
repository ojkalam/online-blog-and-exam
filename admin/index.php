<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style>
.adminpanel{
	width:500px;
	margin:0 auto;
	color:#999;}



</style>

<div class="main">
<h1>Admin Panel</h1>
<div class="adminpanel">
<h2>Welcome To Admin Panel</h2>
<p>You Can Manage User And Control Online Exam System.......................................</p>
</div>


	
</div>
<?php include 'inc/footer.php'; ?>