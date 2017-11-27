<?php
	include_once ("/../libs/Session.php");
    include_once ("/../libs/Database.php");
    include_once ("/../helpers/Format.php");
	

Class Exam{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}


	public function getQueByOrder(){
		 $query  = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";	
		 $result = $this->db->select($query);
		 return $result;	
	}
		
	public function delQuestion($quesNo){
			$tables = array("tbl_ques","tbl_ans");
			foreach ($tables as $table){
				$delquery = "DELETE FROM $table WHERE quesNo='$quesNo'";
				$deldata = $this->db->delete($delquery);
			} 
			if ($deldata){
				$msg = "<span class='success'> Question Delete Successfully..</span> ";
				return $msg;

			}else{
				$msg = "<span class='error'>Question Not Deleted ! </span>";
				return $msg;
			}
	}



	public function addQuestions($data, $examid){
			$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
			$ques   = mysqli_real_escape_string($this->db->link, $data['ques']);
			$ans    = array();
			$ans[1] = $this->fm->validation($data['ans1']);
			$ans[2] = $this->fm->validation($data['ans2']);
			$ans[3] = $this->fm->validation($data['ans3']);
			$ans[4] = $this->fm->validation($data['ans4']);
			$rightAns = $data['rightAns'];
			$query ="INSERT INTO tbl_ques(quesNo, ques, examid) VALUES('$quesNo','$ques','$examid')";
			$insert_row = $this->db->insert($query);
			if ($insert_row){
				foreach ($ans as $key => $ansName) {
					if ($ansName != ''){
						if ($rightAns == $key) {
						$rquery ="INSERT INTO tbl_ans(quesNo,examid, rightAns, ans) VALUES('$quesNo', '$examid', '1', '$ansName')";
						}else{
						$rquery ="INSERT INTO tbl_ans(quesNo, examid, rightAns, ans) VALUES('$quesNo', '$examid', '0', '$ansName')";
						}
						$insertrow = $this->db->insert($rquery);
						if($insertrow){
							continue;
						}else{
							die('Error...');
						}
					}
				}
				$msg = "<span class='success'>Question added Successfully.</span>";
				return $msg;
			}
	}

	public function getQuestion(){
			$query = "SELECT * FROM tbl_ques";
			$getData = $this->db->select($query);	
			$result = $getData->fetch_assoc();
			return $result;
		}	
		
	public function getQuestionByID($number){
			$query = "SELECT * FROM tbl_ques WHERE quesno='$number'";
			$getData = $this->db->select($query);	
			$result = $getData->fetch_assoc();
			return $result;
		}								


	//Create exam
	public function createExam($data, $tch){
		$name = $this->fm->validation($data['extitle']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$sub = $this->fm->validation($data['subject']);
		$sub = mysqli_real_escape_string($this->db->link, $sub);
		if (empty($name) or empty($sub)) {
			return false;
		}else{
			$query = "INSERT INTO tbl_exam(name,subject,author) VALUES('$name','$sub','$tch')";
			$inserted = $this->db->insert($query);
			if ($inserted) {

				$query = "SELECT * FROM tbl_exam  ORDER BY id DESC LIMIT 1";
				$getData = $this->db->select($query);	
				$row = $getData->fetch_assoc();

				Session::set("examname",$row['name']);
				Session::set("examid",$row['id']);

				return true;
			}else{
				return false;
			}
		}
	}
	//get exam info
	public function getAllExam(){
			$query = "SELECT * FROM tbl_exam";
			$getData = $this->db->select($query);	
			if($getData){
			return $getData;
			}else{
				return false;
			}
		}

	//get total quetion by exam id
	public function getQuestionByExam($id){
			$query = "SELECT * FROM tbl_ques WHERE examid='$id'";
			$getData = $this->db->select($query);
			if ($getData) {
				return $getData->num_rows;
			}else{
				return 0;
			}
			
	}	
	//get questions by exam id 
	//get total quetion by exam id
	public function getQuestionByExamId($id){
			$query = "SELECT * FROM tbl_ques WHERE examid='$id'";
			$getData = $this->db->select($query);
			if ($getData) {
				return $getData;
			}else{
				return false;
			}
			
	}

	//get total quetion by exam id
	public function getQuestionSingleQs($exid, $qsno){
			$query = "SELECT * FROM tbl_ques WHERE examid='$exid' and quesNo='$qsno'";
			$getData = $this->db->select($query);
			if ($getData) {
				return $getData;
			}else{
				return false;
			}
			
	}
	//get exam by id
	public function getExamById($id){
			$query = "SELECT * FROM tbl_exam WHERE id='$id'";
			$getData = $this->db->select($query);
			if ($getData) {
				return $getData;
			}else{
				return false;
			}
			
	}

	//delete exam and that exam question
	public function daleteExam($delid)	{
			$delquery = "DELETE FROM tbl_exam WHERE id='$delid'";
			$deldata = $this->db->delete($delquery);
		
			if ($deldata) {
			return true;

			}else{
				return false;
			}
	}

	//get question answer
		public function getAns($qno, $exid){
			$query = "SELECT * FROM tbl_ans WHERE quesNo='$qno' and examid ='$exid'";
			$getData = $this->db->select($query);	
			return $getData;
		}
	//process answer
	public function processAnswer($data,$examid){
		$selectedans = $this->fm->validation($data['answer']);
		$selectedans = mysqli_real_escape_string($this->db->link, $selectedans);
		$qsno = $this->fm->validation($data['qsno']);
		$qsno = mysqli_real_escape_string($this->db->link, $qsno);
		$nextqs = $qsno+1;
		if (!isset($_SESSION['score'])) {
			$_SESSION['score'] = 0;
		}

		$totalqs = $this->getQuestionByExam($examid);
		$rightans = $this->rightAns($qsno);
		

		if ($rightans == $selectedans) {
			$_SESSION['score']++;
		}

		if ($totalqs == $qsno) {
			$exinfo = $this->getExamById($examid);
			$exinfo = $exinfo->fetch_assoc();
			$exname = $exinfo['name'];
			$userid = Session::get('userid');
			$score  = $_SESSION['score'];
			$query = "INSERT INTO tbl_result(exname,exid,userid,score) VALUES('$exname','$examid','$userid','$score')";
			$inserted = $this->db->insert($query);
			if ($inserted) {
				Session::set("lastexam",$examid);
			header("Location: endtestpage.php?exid=".$examid."&&tqs=".$totalqs);
			}
		}else{
			header("Location: giveexam.php?qs=".$nextqs."&&exid=".$examid);
		}
	}

	//right answer
	public function rightAns($qsno){
		$query = "SELECT * FROM tbl_ans WHERE quesNo='$qsno' AND rightAns='1'";
			$getData = $this->db->select($query)->fetch_assoc();	
			return $getData['id'];

	}

	//get exam by user id 
	public function getResultByUser($userid){
		$query = "SELECT * FROM tbl_result WHERE userid='$userid'";
		$getData = $this->db->select($query);
		return $getData;
	}
	//get report 
	public function getTestResult($score, $lsex){
		$userid = Session::get("userid");
		$query = "SELECT * FROM tbl_result WHERE exid='$lsex' AND score='$score' AND userid='$userid' ORDER BY id DESC LIMIT 1;
		";
		$getData = $this->db->select($query);
		return $getData;
	}





//end of Exam class
	}
?>