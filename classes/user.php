<?php
	include_once ("/../libs/Session.php");
    include_once ("/../libs/Database.php");
    include_once ("/../helpers/Format.php");
	

Class User{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}
								
	//customer login
	public function userLogin($data){
		$type = $data['user_type'];
		$uname = $data['uname'];
		$pass = $data['pass'];
		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);
		$pass = $this->fm->validation($data['pass']);
	    $pass = mysqli_real_escape_string($this->db->link, $pass);

	    //check empty
	    if (empty($uname) or empty($pass))
		{
			$msg = "Fields must not be empty !";
			return $msg;
		}else{

			if ($type == 'std') {
			//students login access
				$sql = "SELECT * FROM tbl_student WHERE username='$uname' AND password='$pass'";
				$result = $this->db->select($sql);
				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("login",true);
					Session::set("checkusertype",true);
					Session::set("usertype","student");
					Session::set("username",$uname);
					Session::set("userid",$value['id']);
					Session::set("name",$value['name']);
					header("Location: index.php");
				}else{
					$msg = "Username or password not matched !";
					return $msg;
				}
			}
			else{
			//teachers login access
				$sql = "SELECT * FROM tbl_teacher WHERE username='$uname' AND password='$pass'";
				$result = $this->db->select($sql);
				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("login",true);
					Session::set("checkusertype",false);
					Session::set("usertype","teacher");
					Session::set("username",$uname);
					Session::set("userid",$value['id']);
					Session::set("name",$value['name']);
					header("Location: index.php");
				}else{
					$msg = "Username or password not matched !";
					return $msg;
				}
			}
		}
	}


















////taken from other project

// public function getAllUser(){
// 	$query = "SELECT * FROM tbl_user ORDER BY id DESC";	
// 	$result = $this->db->select($query);
// 		return $result;		
// 		}
		
// public function DisableUser($userid){
// 	$query = "UPDATE tbl_user 
// 			SET
// 			status ='1'
// 			WHERE id=$userid";
// 	$updated= $this->db->update($query);
// 	if($updated){
// 		$msg ="<samp class='success'>User Desable.</samp>";
// 		return $msg;
// 		}
// 	else {
// 		$msg ="<samp class='error'>User Not Desable.</samp>";
// 		return $msg;
// 		}
// 	}
	
// public function EnableUser($userid){
// 	$query = "UPDATE tbl_user 
// 			SET
// 			status ='0'
// 			WHERE id=$userid";
// 	$updated= $this->db->update($query);
// 	if($updated){
// 		$msg ="<samp class='success'>User Enable.</samp>";
// 		return $msg;
// 		}
// 	else {
// 		$msg ="<samp class='error'>User Not Enable.</samp>";
// 		return $msg;
// 		}
// 	}
// public function RemoveUser($userid){
// 	$query = "DELETE FROM tbl_user WHERE id=$userid";
// 	$updated= $this->db->update($query);
// 	if($updated){
// 		$msg ="<samp class='success'>User Delated.</samp>";
// 		return $msg;
// 		}
// 	else {
// 		$msg ="<samp class='error'>User Not Delated.</samp>";
// 		return $msg;
// 		}
// 	}


// public function userRegistration($name, $username, $password, $email){
// 		$name     = $this->fm->validation($name);
// 		$username = $this->fm->validation($username);
// 		$password = $this->fm->validation($password);
// 		$email    = $this->fm->validation($email);

// 		$name     = mysqli_real_escape_string($this->db->link, $name);
// 		$username = mysqli_real_escape_string($this->db->link, $username);
// 		$password = mysqli_real_escape_string($this->db->link, $password);
// 		$email    = mysqli_real_escape_string($this->db->link, $email);

// 		if ($name == "" || $username == "" || $password == "" || $email == ""){
// 			echo "<span style='color:red'>Fields Must not be empty!</span>";
// 			exit();
// 		}else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
// 			echo "<span style='color:red'>Invalid Email Address!</span>";
// 			exit();
// 		}else{
// 			$chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
// 			$chkresult = $this->db->select($chkquery);
// 			if ($chkresult != false){
// 				echo "<spanstyle='color:red'>Email Address Exit!</span>";
// 				exit();
// 			}else{
// 				$query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name','$username','$password','$email')";
// 				$inserted_row = $this->db->insert($query);
// 				if ($inserted_row){
// 					echo "<span style='color:green'> Registration success!</span>";
// 					exit();
// 				}else{
// 					echo "<span style='color:red'>Error..Not Registration!</span>";
// 					exit();
// 				}
// 			}
// 		}
			
// 	}


// public function userLogin($email, $password){
// 		$email    = $this->fm->validation($email);
// 		$password = $this->fm->validation($password);
// 		$email    = mysqli_real_escape_string($this->db->link, $email);
// 		$password = mysqli_real_escape_string($this->db->link, $password);

// 		if ($email == "" || $password == ""){
// 			echo "empty";
// 			exit();
// 		}else{
// 			$query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
// 		    $result = $this->db->select($query);
// 		    if ($result != false) {
// 		    	$value = $result->fetch_assoc();
// 		    	if ($value['status'] == '1'){
// 		    		echo "disable";
// 		    		exit();
// 		    	}else{
// 		    		Session::init();
// 		    		Session::set("login", true);
// 					Session::set("id", $value['id']);
// 					Session::set("username", $value['username']);
// 					Session::set("name", $value['name']);
// 		    	}
// 		    }else {
// 		    	echo "error";
// 		    	exit();

// 		    }
// 		}

// 	}
// public function getUserData($userId){
// 	$query = "SELECT * FROM tbl_user WHERE id ='$userId'";	
// 	$result = $this->db->select($query);
// 		return $result;			
// 	}
	
// public function userUpdate($name, $username, $email, $userId){
// 		$name     = $this->fm->validation($name);
// 		$username = $this->fm->validation($username);
// 		$email    = $this->fm->validation($email);
// 		$id    = $this->fm->validation($userId);

// 		$name     = mysqli_real_escape_string($this->db->link, $name);
// 		$username = mysqli_real_escape_string($this->db->link, $username);
// 		$email    = mysqli_real_escape_string($this->db->link, $email);
// 		$id    = mysqli_real_escape_string($this->db->link, $userId);
	
// 			$query = "UPDATE tbl_user 
// 			SET
// 			name = '$name',
// 			username = '$username',
// 			email = '$email'	
					
// 			WHERE id = $id";
// 		$updated= $this->db->update($query);
// 		if($updated){
// 			$msg ="<samp>User Data Updated.</samp>";
// 			return $msg;
// 			}
// 		else {
// 		$msg ="<samp >User Data Not Updated.</samp>";
// 			return $msg;
// 		}
// 		}


//end of class	
}
?>