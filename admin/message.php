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
require_once'portfolio.php';
 $portfolio=new Portfolio();
  // if (isset($_POST['submit'])) {
 
  // $portfolio->testimonila($_POST,"testimonial");
  // 	//print_r($_POST);
  // }

  //  $testimonialResult=$portfolio->getTestimonialData("testimonial", "*", "testimonial_status=1");

  //  if (isset($_POST['update'])) {
  //  		$id=$_POST['updateId'];
  //  		$portfolio->updateTestimonial( $_POST,"testimonial","id=$id");
  //  } // end update if ------

  //  if (isset($_GET['delete'])) {
  //  		$id=$_GET['delete'];
  //  		$portfolio->deleteById("testimonial", "id=$id");
  //  }
?>


<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include("dashboard_menu.php"); ?>

<div class="container">
<h2>Dashboard</h2>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="jumbotron">
				<div class="table-responsive" >
			<h3 style="background-image: url(../img/title_bg.PNG);color: #ffffff; padding: 5px; font-weight: lighter; border-radius: 5px;"><span class="	glyphicon glyphicon-envelope"></span> Your Message List form Customes  </h3>
				<?php 
				echo $portfolio->viewMessage("message", "*");
				?>
			</div>
			</div>
		</div>
	</div><!-- end row -->
      
</div><!--end container-->

<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>