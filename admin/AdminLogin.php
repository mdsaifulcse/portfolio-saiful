<?php
session_start();
require_once'Database.php';
class AdminLogin extends Database{
	
public function userLogin($data){
extract($data);

	$password=sha1($password);
	$sql="SELECT * FROM users WHERE email='$email' AND password='$password' AND status=1 ";
	if (mysqli_query($this->conn, $sql)) {
		 $queryResult=mysqli_query($this->conn, $sql);

		 if ($queryResult->num_rows==1) {
		 	$userInfo=mysqli_fetch_assoc($queryResult);
		 	print_r($userInfo);

		 	if ($userInfo) {
		 	extract($userInfo);
		 	$_SESSION['id']=$id;
		 	$_SESSION['name']=$name;
		 	header("location:dashboard.php");
		 	}
		 }else{
		 	return $message='Wrong Email OR Password';
		 }

		 

	}else{ // end mysqli_query if----------
		die('Bad Query'.$this->conn->error);
	}
} // end userLogin ---------

public function logout(){
	if ($_SESSION['id']==NULL OR $_SESSION['name']==NULL) {
		return header("location:index.php");
	}
} // end logout ----

} // end AdminLogin class-----------------------

?>