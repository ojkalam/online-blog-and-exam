<?php
    include_once ("/../lib/Database.php");
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
			$msg = "<span class='success'> Data Delete Successfully..</span> ";
			return $msg;

		}else{
			$msg = "<span class='error'>Data Not Deleted ! </span>";
			return $msg;
		}
}

public function getTotalRows(){
		$query = "SELECT * FROM tbl_ques";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
}	

public function addQuestions($data){
		$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques   = mysqli_real_escape_string($this->db->link, $data['ques']);
		$ans    = array();
		$ans[1] = $data['ans1'];
		$ans[2] = $data['ans2'];
		$ans[3] = $data['ans3'];
		$ans[4] = $data['ans4'];
		$rightAns = $data['rightAns'];
		$query ="INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo','$ques')";
		$insert_row = $this->db->insert($query);
		if ($insert_row){
			foreach ($ans as $key => $ansName) {
				if ($ansName != ''){
					if ($rightAns == $key) {
					$rquery ="INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
					}else{
					$rquery ="INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
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

public function getAns($qno){
		$query = "SELECT * FROM tbl_ans WHERE quesno='$qno'";
		$getData = $this->db->select($query);	
		return $getData;
	}
	
}
?>