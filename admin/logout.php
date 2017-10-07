<?php
session_start();
if (isset($_GET['logout'])) {
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	header("location:index.php");
}

?>