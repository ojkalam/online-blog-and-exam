<?php
	include_once ("/../libs/Session.php");
    include_once ("/../libs/Database.php");
    include_once ("/../helpers/Format.php");
	

Class Adminobls{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}
								
	//customer login
	public function adminLogin($data){
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
			//admin login access
			$sql = "SELECT * FROM tbl_admin WHERE user='$uname' AND pass='$pass'";
			$result = $this->db->select($sql);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("adminLogin",true);
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

	//get all post form admin
	//get all post
	public function getAllPost(){
		
		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				ORDER BY tbl_post.id DESC";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			$msg = "<span class='error'>No Posts found !.</span>";
			return $msg;
		}
	}

	//get all students
	public function getTotalStudentRows(){
		$sql = "SELECT * FROM tbl_student ORDER BY id DESC";
	
		$result = $this->db->select($sql);
		return $result;
	}
	//get all Teachers
	public function getTotalTeacherRows(){
		$sql = "SELECT * FROM tbl_teacher ORDER BY id DESC";
	
		$result = $this->db->select($sql);
		return $result;
	}
	public function daletePost($delid){
		$sql = "DELETE FROM tbl_post WHERE id='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}
	//add student
	public function addStudent($data){

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);

		$pass = $this->fm->validation($data['pass']);
		$pass = mysqli_real_escape_string($this->db->link, $pass);

		$class = $this->fm->validation($data['class']);
		$class = mysqli_real_escape_string($this->db->link, $class);

		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		$query = "INSERT INTO tbl_student(name,username,password,class,phone) VALUES('$name','$uname','$pass','$class','$phone')";
		$inserted = $this->db->insert($query);
		if ($inserted) {
			return true;
		}else{
			return false;
		}
	}

	//update student
	public function updateStudent($data, $stid){

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);

		$pass = $this->fm->validation($data['pass']);
		$pass = mysqli_real_escape_string($this->db->link, $pass);

		$class = $this->fm->validation($data['class']);
		$class = mysqli_real_escape_string($this->db->link, $class);

		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		$query = "UPDATE tbl_student
				   SET 
				   name         = '$name',
				   username     = '$uname',
				   password     = '$pass',
				   class        = '$class',
				   phone        = '$phone'
				   WHERE id = '$stid' ";
		$updated = $this->db->update($query);
		if ($updated) {
			return true;
		}else{
			return false;
		}
	}
	//delete student
	public function daleteStudent($delid){
		$sql = "DELETE FROM tbl_student WHERE id='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	//add Teachers
	public function addTeacher($data){

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);

		$pass = $this->fm->validation($data['pass']);
		$pass = mysqli_real_escape_string($this->db->link, $pass);

		$degree = $this->fm->validation($data['degree']);
		$degree = mysqli_real_escape_string($this->db->link, $degree);

		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		$query = "INSERT INTO tbl_teacher(name,username,password,degree,phone) VALUES('$name','$uname','$pass','$degree','$phone')";
		$inserted = $this->db->insert($query);
		if ($inserted) {
			return true;
		}else{
			return false;
		}
	}

	//update Teacher
	public function updateTeacher($data, $tcid){

		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$uname = $this->fm->validation($data['uname']);
		$uname = mysqli_real_escape_string($this->db->link, $uname);

		$pass = $this->fm->validation($data['pass']);
		$pass = mysqli_real_escape_string($this->db->link, $pass);

		$degree = $this->fm->validation($data['degree']);
		$degree = mysqli_real_escape_string($this->db->link, $degree);

		$phone = $this->fm->validation($data['phone']);
		$phone = mysqli_real_escape_string($this->db->link, $phone);

		$query = "UPDATE tbl_teacher
				   SET 
				   name         = '$name',
				   username     = '$uname',
				   password     = '$pass',
				   degree       = '$degree',
				   phone        = '$phone'
				   WHERE id = '$tcid' ";
		$updated = $this->db->update($query);
		if ($updated) {
			return true;
		}else{
			return false;
		}
	}

	//delete student
	public function daleteTeacher($delid){
		$sql = "DELETE FROM tbl_teacher WHERE id='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	//add subject
	public function addSubject($data){
		$name = $this->fm->validation($data['subname']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$query = "INSERT INTO tbl_subject(name) VALUES('$name')";
		$inserted = $this->db->insert($query);
		if ($inserted) {
			return true;
		}else{
			return false;
		}
	}
	//delete subject
	public function daleteSubject($delid){
		$sql = "DELETE FROM tbl_subject WHERE id='$delid'";
		$result = $this->db->delete($sql);
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	//get single student
	public function getSingleStudentRows($stdid){

		$sql = "SELECT * FROM tbl_student WHERE id = '$stdid'";
		$result = $this->db->select($sql);
		return $result;

	}

	//get single teacher
	public function getSingleTeacherRows($tcid){
		$sql = "SELECT * FROM tbl_teacher WHERE id = '$tcid'";
		$result = $this->db->select($sql);
		return $result;
	}











//end of Adminobls class
	}
?>