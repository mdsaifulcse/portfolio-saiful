<?php
require_once'Database.php';
class Contact extends Database{


public function queryExecution($sql, $status=NULL){
	if (mysqli_query($this->conn, $sql)) {
		if ($status) {
			return $queryResult=mysqli_query($this->conn, $sql);
		}
	}else{
		die("Query Error".$this->conn->error);
	}

} // end queryExecution----------------

public function addContactInfo($data){

	extract($data);
	$cell_no=$this->conn->real_escape_string($cell_no);
	$email_address=$this->conn->real_escape_string($email_address);
	$skype_address=$this->conn->real_escape_string($skype_address);
	$web_address=$this->conn->real_escape_string($web_address);
	$address=$this->conn->real_escape_string($address);

	$sql="INSERT INTO contact_info(cell_no,email_address, skype_address,web_address,address,status) VALUES('$cell_no', '$email_address', '$skype_address', '$web_address', '$address', '$status')";

	return $this->queryExecution($sql);
} // end addContactInfo

public function getContactInfo(){
	$sql="SELECT * FROM contact_info";

	$status="info";
	return $queryResult=$this->queryExecution($sql, $status);
} // end getContactInfo -------

public function getpublishedContact(){
	$sql="SELECT * FROM contact_info WHERE status=1 ";

	$status='pubsidhed';
	return $queryResult=$this->queryExecution($sql, $status);
} // end getpublishedContact -----------------

public function getinfoById($id){
	$sql="SELECT * FROM contact_info WHERE id='$id' ";

	$status='byId';
	return $queryResult=$this->queryExecution($sql, $status);
} // end getinfoById ---------------


public function updateContact($data){
	extract($data);
	$cell_no=$this->conn->real_escape_string($cell_no);
	$email_address=$this->conn->real_escape_string($email_address);
	$skype_address=$this->conn->real_escape_string($skype_address);
	$web_address=$this->conn->real_escape_string($web_address);
	$address=$this->conn->real_escape_string($address);

	$sql="UPDATE contact_info SET cell_no='$cell_no', email_address='$email_address', skype_address='skype_address', web_address='$web_address', address='$address', status='$status' WHERE id='$edit_id' ";
	return $this->queryExecution($sql);
} // end updateContact ---------------------


public function deleteContact($delId){
	$sql="DELETE FROM contact_info WHERE id='$delId' ";
	return $this->queryExecution($sql);
} // end deleteContact -----------------------



} // end Contact---------

?>