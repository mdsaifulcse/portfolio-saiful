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
  if (isset($_POST['submit'])) {
 
  $portfolio->testimonila($_POST,"testimonial");
  	//print_r($_POST);
  }

   $testimonialResult=$portfolio->getAllData("testimonial", "*");

   if (isset($_POST['update'])) {
   		$id=$_POST['updateId'];
   		$portfolio->updateTestimonial($_POST,"testimonial","id=$id");
   } // end update if ------

   if (isset($_GET['delete'])) {
   		$id=$_GET['delete'];
   		$portfolio->deleteById("testimonial", "id=$id");
   }
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
<h1 style="color: green"><?php echo $portfolio->message;?></h1>
	<div class="row">
		<div class="col-md-12">
		
		<?php
		if (isset($_GET['update'])){?>

		<?php
		$id=$_GET['update'];
		$testimonialResultById=$portfolio->getDataById("testimonial", "*", "id=$id");
		extract($testimonialResultById);

		?>

		<div class="well">
			<a href="testimonials.php">&laquo;  Back</a>
			<h2 class="text-warning text-center">Update Testimonial</h2><br/>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Title</label>
				<div class="col-md-9">
					<input type="text" name="testimonial_title" value="<?php echo $testimonial_title?"$testimonial_title":""; ?>" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Content</label>
				<div class="col-md-9">
					<textarea name="testimonial_content" cols="50" rows="5"><?php echo $testimonial_content?"$testimonial_content":""; ?></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Image</label>
				<div class="col-md-9">
					<input type="file" name="testimonial_image" accept="image/*">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Status</label>
				<div class="col-md-9">
					<select name="testimonial_status">
						<option>--Select Status--</option>
						<option value="1" <?php echo $testimonial_status==1?"selected":"";?>>Publish</option>
						<option value="0" <?php echo $testimonial_status==0?"selected":"";?> >Unpublish</option>
					</select>
				</div>
			</div> <!-- end form-group -->
				

			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
				<input type="hidden" name="updateId" value="<?php echo $id;?>">
					<input type="submit" name="update" value="Update Testimonial" class="btn btn-success btn-block">
				</div>
			</div> <!-- end form-group -->
				
		</form>
		</div>
		<?php }else{?>
		<div class="well">
			<h2 class="text-primary text-center">Manage Testimonial</h2><br/>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Title</label>
				<div class="col-md-9">
					<input type="text" name="testimonial_title" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Content</label>
				<div class="col-md-9">
					<textarea name="testimonial_content" cols="50" rows="5"></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Image</label>
				<div class="col-md-9">
					<input type="file" name="testimonial_image" accept="image/*">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Testimonial Status</label>
				<div class="col-md-9">
					<select name="testimonial_status">
						<option>--Select Status--</option>
						<option value="1">Publish</option>
						<option value="0">Unpublish</option>
					</select>
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
					<input type="submit" name="submit" value="Save Testimonial" class="btn btn-success btn-block">
				</div>
			</div> <!-- end form-group -->

			
				
		</form>
		</div>
		<?php };?>

		</div><!--end col-md-12 -->
	</div>

	<div>
		<div class="col-md-12">
			<div class="well">
				<h2 class="text-primary text-center"><span class="glyphicon glyphicon-list"></span> Your Testimonial List</h2>

			<table class="table table-bordered table-striped table-hover table-condensed ">
				<thead>
					<tr>
						<th>Testimonial Title </th>
						<th>Testimonial Content </th>
						<th>Testimonial Status </th>
						<th>Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
      foreach ($testimonialResult as $testimonail) {
        extract($testimonail);
        ?>
        <tr>
        <td><?php echo $testimonial_title;?></td>
        <td><?php echo $testimonial_content;?></td>
        <td><?php echo $testimonial_status==1?"Published":"Unpublished";?> </td>
        <td>
        <a href="?update=<?php echo $id;?>"><span class="glyphicon glyphicon-edit text-warning"></span> </a> ||
        <a href="?delete=<?php echo $id;?>" onclick=" return confirm('Realy Do You Want to delete Parmanently ? Can not Undo !')" ><span class="glyphicon glyphicon-trash text-danger"></span> </a>
        </td>
      </tr>

    </div>

      <?php } ?> 
				</tbody>
			</table>
			</div>
		</div>
		</div><!--end col-md-6 -->
	</div><!-- end row-->
</div><!--end container-->

<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	CKEDITOR.replace( 'testimonial_content' );
</script>
</body>
</html>


<!-- <form class="form-horizontal" action="" method="" enctype= multipart/form-data>
	<table align="center" cellpadding="10">
	<h3> Manage Your Testimonial  </h3>
		<tr>
			<td>Testimonial Title</td>
			<td><input type="text" name="testimonial_title"> </td>
		</tr>
		<tr>
			<td>Testimonial Content</td>
			<td><input type="text" name="testimonial_content"> </td>
		</tr>
		<br/><br/>
		<tr>
			<td>Testimonial Image</td>
			<td><input type="file" name="testimonial_image"> </td>
		</tr>
		<tr>
			<td>Testimonial Status</td>
			<td>
				<select name="testimonial_status">
					<option>--Select staus--</option>
					<option value="1">Published</option>
					<option value="0">Unpublished</option>
				</select> 
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Save Testimonial" class="btn btn-success"> </td>
		</tr>
	</table>
</form> -->