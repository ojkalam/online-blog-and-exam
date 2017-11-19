<?php 
    include_once ("../lib/Session.php");
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");

Class Admin{
	
	private $db;
	private $fm;
	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
 		
	}


public function getAdminData($data){
	$adminuser = $this->fm->validation($data['adminuser']);
	$adminpass = $this->fm->validation($data['adminpass']);
	
	if(empty($adminuser)or empty($adminpass)){
		echo "<span style='color:red;font-size:18px;'>Field Must Not Be Empty...</span>";
		}
	else{
		$query = "SELECT * FROM tbl_admin WHERE adminpass='$adminpass' AND adminpass='$adminpass'";
		$result= $this->db->select($query);
		if($result != false){
			$value =$result->fetch_assoc();
			Session::init();
			Session::set("adminLogin", true);
			Session::set("adminuser", $value['adminuser']);
			Session::set("adminid", $value['adminid']);
			header("Location: index.php");	
			}else {
			$msg ="<span style='color:red;font-size:18px;'>Username 
       or Password Not Matched</span>";
				return $msg;	
				}
		
		}
	}
}
?>