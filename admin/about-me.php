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
require_once'AboutMe.php';
 $aboutMe=new AboutMe();
  if (isset($_POST['submit'])) {
 
  $aboutMe->saveAboutMeInfo($_POST);
  header("location:about-me.php");
  	//print_r($_POST);
  }

    $aboutInfoResult=$aboutMe->getAboutInfo();

    if (isset($_POST['update'])) {
    	//print_r($_POST);
    		$id=$_POST['updateId'];
   		$aboutMe->updatAboutMe($_POST, "$id");
   			header("location:about-me.php");
   		
    } // end update if ------

    if (isset($_GET['delete'])) {
   		$id=$_GET['delete'];
    	$aboutMe->deleteById("$id");
    	header("location:about-me.php");
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
<h1 style="color: green"><?php //echo $portfolio->message;?></h1>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
		<?php
		if (isset($_GET['update'])){?>

		<?php
		$id=$_GET['update'];
		$aboutResultById=$aboutMe->getDataById("$id");
		$aboutResultById=mysqli_fetch_assoc($aboutResultById);
		extract($aboutResultById);

		?>
			<div class="well">
				<a href="about-me.php">&laquo; Back</a>
			<h2 class="text-primary text-center"><span class="glyphicon glyphicon-edit text-warning"></span>  Update about Information</h2><br/>
		<form class="form-horizontal" action="" method="POST">

			<div class="form-group">
				<label class="col-md-3 control-label">About Me</label>
				<div class="col-md-9">
					<textarea name="about_me" cols="71" rows="5"><?php echo $about_me?>
					</textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label">Title</label>
				<div class="col-md-9">
					<input type="text" name="title" value="<?php echo $title;?>" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label">Your Content</label>
				<div class="col-md-9">
					<textarea name="content" cols="71" rows="5"><?php echo $content;?>
					</textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 1</label>
				<div class="col-md-9">
					<input type="text" name="tag_one" value="<?=$tag_one?>" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 2</label>
				<div class="col-md-9">
					<input type="text" name="tag_two" value="<?=$tag_two;?>" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 3</label>
				<div class="col-md-9">
					<input type="text" name="tag_three" value="<?=$tag_three?>" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 4</label>
				<div class="col-md-9">
					<input type="text" name="tag_four" value="<?=$tag_four?>" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 5</label>
				<div class="col-md-9">
					<input type="text" name="tag_five" value="<?=$tag_five?>" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Status</label>
				<div class="col-md-9">
					<select name="status" class="form-control">
						<option>--Select Status--</option>
						<option value="1" <?php echo $status==1?"selected":""; ?> >Publish</option>
						<option value="0" <?php echo $status==0?"selected":""; ?>>Unpublish</option>
					</select>
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<input type="hidden" name="updateId" value="<?=$id;?>">
					<input type="submit" name="update" value="Update Info" class="btn btn-success btn-block">
				</div>
			</div> <!-- end form-group -->

			</div>

			
				
		</form>
		<?php }else{?>
		<div class="well">
			<h2 class="text-primary text-center"><span class="	glyphicon glyphicon-pencil"></span> About Your Information </h2><br/>
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

			<div class="form-group">
				<label class="col-md-3 control-label">About Me</label>
				<div class="col-md-9">
					<textarea name="about_me" cols="71" rows="5"></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label">Title</label>
				<div class="col-md-9">
					<input type="text" name="title" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label">Your Content</label>
				<div class="col-md-9">
					<textarea name="content" cols="71" rows="5"></textarea>
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 1</label>
				<div class="col-md-9">
					<input type="text" name="tag_one" class="form-control">
				</div>
			</div> <!-- end form-group -->
			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 2</label>
				<div class="col-md-9">
					<input type="text" name="tag_two" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 3</label>
				<div class="col-md-9">
					<input type="text" name="tag_three" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 4</label>
				<div class="col-md-9">
					<input type="text" name="tag_four" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Tag Line 5</label>
				<div class="col-md-9">
					<input type="text" name="tag_five" class="form-control">
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<label class="col-md-3 control-label"> Status</label>
				<div class="col-md-9">
					<select name="status" class="form-control">
						<option>--Select Status--</option>
						<option value="1">Publish</option>
						<option value="0">Unpublish</option>
					</select>
				</div>
			</div> <!-- end form-group -->

			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<input type="submit" name="submit" value="Save About Info" class="btn btn-success btn-block">
				</div>
			</div> <!-- end form-group -->

			
				
		</form>
		</div>
		<?php };?>

		</div><!--end col-md-6 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<h2><span class="glyphicon glyphicon-list text-center text-primary"></span>  Manage Your Information</h2>

			<table class="table table-bordered table-striped table-hover table-condensed ">
				<thead>
					<tr>
						<th>Id </th>
						<th>About Me </th>
						<th>Title</th>
						<th>First Tag </th>
						<th>Status </th>
						<th>Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
      while($aboutInfo=mysqli_fetch_assoc($aboutInfoResult )) {
        extract($aboutInfo);
        ?>
        <tr>
        <td><?php echo $id;?></td>

        <td><?php echo $about_me;?></td>
        <td><?php echo $title;?></td>
        <td><?php echo $tag_one;?></td>
        <td><?php echo $status==1?"Published":"Unpublished";?> </td>
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