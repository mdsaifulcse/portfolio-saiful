<?php
	class Database{
		protected $conn;
		public function __construct(){
			$this->conn=new mysqli("localhost", "root", "", "portfolio");

			if ($this->conn->connect_errno){
				die("Database Connect Erro".$this->conn->connect_errno);
			}
		}

	} //end Database class -----
?>