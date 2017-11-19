<?php
    include_once ("/../lib/Database.php");
    include_once ("/../helpers/Format.php");
	include_once ("/../lib/Session.php");
	// Session::init();
	


Class Process{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
		}
public function processDat($data){
		$selectedans  = $this->fm->validation($data['ans']);
		$number       = $this->fm->validation($data['number']);
		
		$next          = $number+1;
		
		
		if(!isset($_SESSION['score'])){
			$_SESSION['score'] = '0';
			}
		
		$total = $this->getTotal();
		$right = $this->rightAns($number);
		if ($right == $selectedans){
			$_SESSION['score']++;
			} 
		if($number == $total){
			header("Location:final.php");
			exit();
			}else{
				header("Location:test.php?q=".$next);
				exit();
				}
	
	}
	
private function getTotal(){
		$query = "SELECT * FROM tbl_ques";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;	
	}
	
private function rightAns($number){
		$query = "SELECT * FROM tbl_ans WHERE quesno='$number' AND rightans='1'";
		$getData = $this->db->select($query)->fetch_assoc();	
		$result = $getData['id'];
		return $result;	
	}

}
?>