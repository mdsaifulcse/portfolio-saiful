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
 
  $portfolio->addNewSkill($_POST,"skills");
  	//print_r($_POST);
  }

   $skillResult=$portfolio->getAllData("skills", "*");

   if (isset($_POST['update'])) {
   		$id=$_POST['updateId'];
   		$portfolio->updateSkill($_POST,"skills","id=$id");
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
		<div class="col-md-6">
		
		<?php
		if (isset($_GET['update'])){?>

		<?php
		$id=$_GET['update'];
		$testimonialResultById=$portfolio->getDataById("skills", "*", "id=$id");
		extract($testimonialResultById);

		?>

		<div class="well">
			<a href="skills.php">&laquo;  Back</a>
			<h2 class="text-warning text-center">Update Skill</h2><br/>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Title</label>
				<div class="col-md-9">
					<input type="text" name="skill_title" value="<?php echo $skill_title?"$skill_title":""; ?>" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Content</label>
				<div class="col-md-9">
					<textarea name="skill_content" cols="50" rows="5"><?php echo $skill_content?"$skill_content":""; ?></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Image</label>
				<div class="col-md-9">
					<input type="file" name="skill_image" accept="image/*">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Status</label>
				<div class="col-md-9">
					<select name="skill_status">
						<option>--Select Status--</option>
						<option value="1" <?php echo $skill_status==1?"selected":"";?>>Publish</option>
						<option value="0" <?php echo $skill_status==0?"selected":"";?> >Unpublish</option>
					</select>
				</div>
			</div> <!-- end form-group -->
				

			<div class="form-group">
				<div class="col-md-6 col-md-offset-3">
				<input type="hidden" name="updateId" value="<?php echo $id;?>">
					<input type="submit" name="update" value="Update SKill" class="btn btn-success btn-block">
				</div>
			</div> <!-- end form-group -->
				
		</form>
		</div>
		<?php }else{?>
		<div class="well">
			<h2 class="text-primary text-center">+ Add New SKills</h2><br/>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-md-3 control-label"> Skills Title</label>
				<div class="col-md-9">
					<input type="text" name="skill_title" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Content</label>
				<div class="col-md-9">
					<textarea name="skill_content" cols="50" rows="5"></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Image</label>
				<div class="col-md-9">
					<input type="file" name="skill_image" accept="image/*">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Skill Status</label>
				<div class="col-md-9">
					<select name="skill_status">
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

		</div><!--end col-md-6 -->

		<div class="col-md-6">
			<div class="well">
				<h2 class="text-primary text-center"><span class="glyphicon glyphicon-list"></span> Your Testimonial List</h2>

			<table class="table table-bordered table-striped table-hover table-condensed ">
				<thead>
					<tr>
						<th>Skill Title </th>
						<th>Skill Content </th>
						<th>Skill Status </th>
						<th>Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
      foreach ($skillResult as $skills) {
        extract($skills);
        ?>
        <tr>
        <td><?php echo $skill_title;?></td>
        <td><?php echo $skill_content;?></td>
        <td><?php echo $skill_status==1?"Published":"Unpublished";?> </td>
        <td>
        <a href="?update=<?php echo $id;?>"><span class="glyphicon glyphicon-edit text-warning"></span></a> ||
        <a href="?delete=<?php echo $id;?>" onclick=" return confirm('Realy Do You Want to delete Parmanently ? Can not Undo !')" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
        </td>
      </tr>

      <?php }
      ?> 
				</tbody>
			</table>
			</div>
		</div><!--end col-md-6 -->
	</div><!-- end row-->
</div><!--end container-->

<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>