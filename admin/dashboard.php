<?php
	 require_once'AdminLogin.php';
	 $adminLogin=new AdminLogin();
	 $adminLogin->logout();

	// if (isset($_REQUEST['action'])) { 
	// 	session_destroy();
	// 	 header("location:index.php");
	// }

	// if (!isset($_SESSION['name'])) {
	// 	header("location:index.php");
	// }

	
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>
<?php include("dashboard_menu.php"); ?>

<div class="main">
<h2>Dashboard</h2>
</div>
</body>
</html>