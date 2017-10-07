<?php
require_once'Database.php';
class AboutMe extends Database{

	public $message;

	public function queryExecution($sql, $status=NULL){
		if (mysqli_query($this->conn, $sql)) {
			if ($status) {
				$queryResult=mysqli_query($this->conn, $sql);
				return $queryResult;
			}
			
		}else{
			die('Query Errors'.$this->conn->error);
		}
	} // end queryExecution ----------------------------------------

	public function saveAboutMeInfo($data){
		extract($data);
		$about_me=$this->conn->real_escape_string($about_me);
		$title=$this->conn->real_escape_string($title);
		$content=$this->conn->real_escape_string($content);
		$tag_one=$this->conn->real_escape_string($tag_one);
		$tag_two=$this->conn->real_escape_string($tag_two);
		$tag_three=$this->conn->real_escape_string($tag_three);
		$tag_four=$this->conn->real_escape_string($tag_four);
		$tag_five=$this->conn->real_escape_string($tag_five);

		$sql="INSERT INTO about_me(about_me,title, content, tag_one, tag_two, tag_three, tag_four, tag_five, status)
			VALUES('$about_me', '$title', '$content', '$tag_one','$tag_two', '$tag_three', '$tag_four','$tag_five' ,'$status')";

			
			return $queryResult= $this->queryExecution($sql);
	} // end saveAboutMeInfo method -------------------

	public function getAboutInfo(){
		$sql="SELECT * FROM about_me";
		$status='about_me';
		return $queryResult=$this->queryExecution($sql,$status);
	}

	public function getDataById($id){
		$sql="SELECT * FROM about_me WHERE id=$id ";
		$status='about_me';
		return $queryResult=$this->queryExecution($sql,$status);
	}

	public function updatAboutMe($data, $id){
		// print_r($data);
		// echo $id;
		// exit();
		extract($data);
		$about_me=$this->conn->real_escape_string($about_me);
		$title=$this->conn->real_escape_string($title);
		$content=$this->conn->real_escape_string($content);
		$tag_one=$this->conn->real_escape_string($tag_one);
		$tag_two=$this->conn->real_escape_string($tag_two);
		$tag_three=$this->conn->real_escape_string($tag_three);
		$tag_four=$this->conn->real_escape_string($tag_four);
		$tag_five=$this->conn->real_escape_string($tag_five);
		$sql="UPDATE about_me SET about_me='$about_me', title='$title', content='$content', tag_one='$tag_one', tag_two='$tag_two', tag_three='$tag_three', tag_four='$tag_four', tag_five='$tag_five', status='$status' WHERE id=$id ";

		return $queryResult=$this->queryExecution($sql);
	} // =-------------------

	public function getAboutinfoBycondition(){
		$sql="SELECT * FROM about_me WHERE status=1";
		$state='publish_data';
		return $queryResult=$this->queryExecution($sql, $state);

	} // end getAboutinfoBycondition -------------

	public function deleteById($id){
		$sql="DELETE FROM about_me WHERE id=$id";

		return $notice=$this->queryExecution($sql);
	} // end ---------------------




} // end AboutMe class

?>