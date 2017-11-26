<?php
	include_once ("/../libs/Session.php");
    include_once ("/../libs/Database.php");
    include_once ("/../helpers/Format.php");
	

Class PostComment{

	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format(); 		
	}

	//get all subject
	public function getSubject(){
		$sql = "SELECT * FROM tbl_subject ORDER BY id ASC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function getSubjectById($id){
		$sql = "SELECT * FROM tbl_subject WHERE id='$id'";
		$result = $this->db->select($sql);
		return $result;
	}

	//create post
	public function createPost($data, $file, $user_id){
		$title = $this->fm->validation($data['title']);
		$title = mysqli_real_escape_string($this->db->link, $title);

		$sub_id = $this->fm->validation($data['subject']);
		$sub_id = mysqli_real_escape_string($this->db->link, $sub_id);

		$description = $data['description'];
		$description = mysqli_real_escape_string($this->db->link, $description);

		//take image information using super global variable $_FILES[];
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		
		if (empty($title) or empty($description) or empty($sub_id))
		{
			$msg = "<span class='error'>Fields must not be empty! Please try again.</span>";
			return $msg;
		}else{

			if (!empty($file_name)) {
				//validate uploaded images
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
				$uploaded_image = "uploads/".$unique_image;
				
				if ($file_size >1048567) {
					$msg = "<span class='error'>Image too large!</span>";
					return $msg;
				} elseif (in_array($file_ext, $permited) === false) {
					echo "You can upload only:-"
					.implode(', ', $permited)."</span>";
				}else{
					move_uploaded_file($file_temp, $uploaded_image);
					$query = "INSERT INTO tbl_post(title,description,user_id,sub_id,image) VALUES('$title','$description','$user_id','$sub_id','$uploaded_image')";

					$inserted = $this->db->insert($query);
					if ($inserted) {
						$msg = "<span class='success'>Post inserted successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to insert</span>";
						return $msg;
					}
			 	}
			}else{

				$query = "INSERT INTO tbl_post(title,description,user_id,sub_id) VALUES('$title','$description','$user_id','$sub_id')";

					$inserted = $this->db->insert($query);
					if ($inserted) {
						$msg = "<span class='success'>Post inserted successfully.</span>";
						return $msg;
					}else{
						$msg = "<span class='error'>Failed to insert</span>";
						return $msg;
					}

			}
			
		}

	}

								
	//get all post
	public function getAllPost($start_from, $per_page){
		
		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				ORDER BY tbl_post.id DESC limit $start_from, $per_page";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			$msg = "<span class='error'>No Posts found !.</span>";
			return $msg;
		}
	}
	public function getTotalPostRows(){
		$sql = "SELECT * FROM tbl_post ORDER BY id DESC";
	
		$result = $this->db->select($sql);
		return $result;
	}

	//count users posts total
	public function userTotalPost(){
		$userid = Session::get("userid");
		$sql = "SELECT * FROM tbl_post WHERE user_id='$userid'";
		$result = $this->db->select($sql);
		$count = $result->num_rows;
		return $count;
	}

	//get single post by id
	public function getSinglePost($postId){

		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				WHERE tbl_post.id='$postId'";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	//get users posts
	public function userPost($uid){
		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				WHERE tbl_post.user_id='$uid'";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}		
	}
	//get subject wise posts
	public function subjectWisePost($subid){
		
		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				WHERE tbl_post.sub_id='$subid'";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}		
	}

	//create comment on posts
	public function commentPost($data,$postid, $username){
		$comment = $this->fm->validation($data['comment']);
		$comment = mysqli_real_escape_string($this->db->link, $comment);
		$query = "INSERT INTO tbl_comment(comment,postid,username) VALUES('$comment','$postid','$username')";
		$inserted = $this->db->insert($query);
		if ($inserted) {
			return true;
		}else{
			return false;
		}
	}
	public function getSinglePostComment($postId){
		$sql = "SELECT * FROM tbl_comment WHERE postid='$postId' ORDER BY id DESC";
	
		$result = $this->db->select($sql);
		if ($result) {
			return $result;
		}else{
			return false;
		}
	}
	//search post
	public function searchPost($search){

		$sql = "SELECT tbl_post.*, tbl_student.username,tbl_subject.name
				FROM tbl_post
				INNER JOIN tbl_student
				ON tbl_post.user_id = tbl_student.id
				INNER JOIN tbl_subject
				ON tbl_post.sub_id = tbl_subject.id
				WHERE tbl_post.title LIKE '%$search%' or tbl_post.description LIKE '%$search%' or tbl_post.pdate LIKE '%search%' ";
		$post = $this->db->select($sql);
		return $post;
	}
	//delete individual posts
	public function deleteUserPost($delp, $user_id){
		$delquery = "DELETE FROM tbl_post WHERE id='$delp' AND user_id='$user_id'";
			$deldata = $this->db->delete($delquery);
		
			if ($deldata) {
			return true;

			}else{
				return false;
			}
	}


//end of class
}

?>