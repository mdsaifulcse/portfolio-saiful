<?php
	require_once'Database.php';

	class Portfolio extends Database{
		public $message;


		public function queryExecution($sql, $status=NULL){
			if (mysqli_query($this->conn, $sql)) {
				if ($status) {
					$queryResult=mysqli_query($this->conn, $sql);
					return $queryResult;
				}
				
			}else{
				die('Qquery Errors'.$this->conn->error);
			}


		} // end queryExecution--------------------------------------

		public function insert($table, $cols){
			$sql="INSERT INTO $table SET $cols";
			$quey=$this->conn->query($sql);

			if ($this->conn->affected_rows>0) {
				return $notification="Data Successfully Saved !";
			}else{
				die('Query Erros'.$this->conn->error);
			}

		} // end insert --------------------------


		public function selectCondition($table, $cols ,$condition){
			$sql="SELECT $cols FROM $table WHERE $condition ORDER BY id DESC";
			$query=$this->conn->query($sql);
			if ($query->num_rows>0) {
				return $query->fetch_All(MYSQLI_ASSOC);
			}else
			die('Query Erros'.$this->conn->error);
		} // end select--------------------selectById

		public function selectById($table, $cols ,$condition){
			$sql="SELECT $cols FROM $table WHERE $condition";
			$query=$this->conn->query($sql);
			if ($query->num_rows>0) {
				return $query->fetch_assoc();
			}else
			die('Query Erros'.$this->conn->error);
		} // end select--------------------selectById

		public function select($table, $cols){
			$sql="SELECT $cols FROM $table ORDER BY id DESC";
			$query=$this->conn->query($sql);
			if ($query->num_rows>0) {
				return $query->fetch_All(MYSQLI_ASSOC);
			}else
			die('Query Erros'.$this->conn->error);
		} // ------------------------------

		public function update($table, $cols ,$condition){
			$sql="UPDATE $table SET $cols WHERE $condition";
			$query=$this->conn->query($sql);

			if ($this->conn->affected_rows>0) {
				header("location:dashboard.php");
				$this->message="Update Successfull";
				return true;
				
			}else{
			die('Query Erros'.$this->conn->error);
			}
		} // end select----------------------------------------

		public function delete($table, $condition){
			$sql="DELETE FROM $table WHERE $condition";
			$query=$this->conn->query($sql);

			if ($this->conn->affected_rows>0) {
				header("location:testimonials.php");
				return true;
			}else{
				die('Query Erros'.$this->conn->error);
			}
		} // end Delete -----------------------------


		public function testimonila($data, $table){
		extract($data);

		$testimonial_title=$this->conn->real_escape_string($testimonial_title);
		$testimonial_content=$this->conn->real_escape_string($testimonial_content);
		//$testimonial_image=$this->conn->real_escape_string($testimonial_image);
		$testimonial_status=$this->conn->real_escape_string($testimonial_status);

		$destination="../img/".$_FILES["testimonial_image"]['name'];

		$path="img/".$_FILES["testimonial_image"]['name'];
		$path=$this->conn->real_escape_string($path);

		$imageName=$_FILES["testimonial_image"]['tmp_name'];

		if (move_uploaded_file($imageName, $destination)) {	
		$this->insert($table, "testimonial_title='$testimonial_title', testimonial_content='$testimonial_content',
			testimonial_image='$path',
		 testimonial_status='$testimonial_status'");
		} //  move_upload_file -----

		} //end testimonila method-----

		public function addNewSkill($data, $table){
		extract($data);

		$skill_title=$this->conn->real_escape_string($skill_title);
		$skill_content=$this->conn->real_escape_string($skill_content);
		//$testimonial_image=$this->conn->real_escape_string($testimonial_image);
		$skill_status=$this->conn->real_escape_string($skill_status);

		$destination="../img/".$_FILES["skill_image"]['name'];

		$path="img/".$_FILES["skill_image"]['name'];
		$path=$this->conn->real_escape_string($path);

		$imageName=$_FILES["skill_image"]['tmp_name'];

		if (move_uploaded_file($imageName, $destination)) {	
		$this->insert($table, "skill_title='$skill_title', skill_content='$skill_content',
			skill_image='$path',
		 skill_status='$skill_status'");
		} //  move_upload_file -----

		} //end addNewSkill method------------------------

		public function getAllData($table, $cols){
			return $this->select($table, $cols);
		} // --------------------------------

		public function getTestimonialCondition($table, $cols, $condition){
			return $this->selectCondition($table, $cols ,$condition);
		} //---------------------------------

		public function getDataById($table, $cols, $condition){
			return $this->selectById($table, $cols ,$condition);
		} //---------------------------------



		public function updateTestimonial($data, $table, $condition){
			//print_r($data);
			extract($data);
			$testimonial_title=$this->conn->real_escape_string($testimonial_title);
		$testimonial_content=$this->conn->real_escape_string($testimonial_content);
		//$testimonial_image=$this->conn->real_escape_string($testimonial_image);
		$testimonial_status=$this->conn->real_escape_string($testimonial_status);

		$destination="../img/".$_FILES["testimonial_image"]['name'];

		$path="img/".$_FILES["testimonial_image"]['name'];
		$path=$this->conn->real_escape_string($path);

		$imageName=$_FILES["testimonial_image"]['tmp_name'];

		if (move_uploaded_file($imageName, $destination)) {	
		$this->update($table,"testimonial_title='$testimonial_title', testimonial_content='$testimonial_content',
			testimonial_image='$path',
		 testimonial_status='$testimonial_status'", $condition);
		}else{
		$this->update($table,"testimonial_title='$testimonial_title', testimonial_content='$testimonial_content',
		 testimonial_status='$testimonial_status'", $condition);

		} //  move_upload_file -----

			
		} // updateTestimonial----------------------------------------


		public function updateSkill($data, $table, $condition){
			//print_r($data);
			extract($data);
			$skill_title=$this->conn->real_escape_string($skill_title);
		$skill_content=$this->conn->real_escape_string($skill_content);
		//$testimonial_image=$this->conn->real_escape_string($testimonial_image);
		$skill_status=$this->conn->real_escape_string($skill_status);

		$destination="../img/".$_FILES["skill_image"]['name'];

		$path="img/".$_FILES["skill_image"]['name'];
		$path=$this->conn->real_escape_string($path);

		$imageName=$_FILES["skill_image"]['tmp_name'];

		if (move_uploaded_file($imageName, $destination)) {	
		$this->update($table,"skill_title='$skill_title', skill_content='$skill_content',
			skill_image='$path',
		 skill_status='$skill_status'", $condition);
		}else{
		$this->update($table,"skill_title='$skill_title', skill_content='$skill_content',
		 skill_status='$skill_status'", $condition);

		} //  move_upload_file -----

			
		} // updateSkill -----------------------------------

		public function showPublishedSkills(){
			$sql="SELECT * FROM skills WHERE skill_status=1";
			$status='published';

			return $queryResult=$this->queryExecution($sql, $status);
		}


		public function deleteById($table, $condition){
			$this->delete($table, $condition);
		} // end deleteById ------------------

		public function message($data,$table){
			extract($data);
			$name=$this->conn->real_escape_string($name);
			$email=$this->conn->real_escape_string($email);
			$message=$this->conn->real_escape_string($message);

			return $this->insert($table, "name='$name', email='$email', message='$message'");
		} // end message method-------------
//border class=table table-bordered table-striped table-hover'

		public function  viewMessage($table, $cols){
			$messageresult=$this->select($table, $cols);


			$table="<table class='table table-bordered table-striped table-hover'>";
				$table.="<tr>";
					$messageKeys=array_keys($messageresult[0]);
					foreach ($messageKeys as $value) {
						$table.="<th>".$value."</th>";
					}

				$table.="</tr>";

				foreach ($messageresult as $values) {
					$table.="<tr>";		
						foreach ($values as $key => $value) {
							$table.="<td>".$value."</td>";
						}
					$table.="<tr>";
				} // end foreach -----------

			$table.="</table>";
			return $table;
		} // end viewMessage ------------


	} // end Portfolio class -------


?>