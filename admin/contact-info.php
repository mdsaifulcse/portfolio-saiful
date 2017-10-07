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
require_once'Contact.php';

 $contact=new Contact();
if (isset($_POST['submit'])) {
	$contact->addContactInfo($_POST);
	header("location:contact-info.php");
}

$queryResult=$contact->getContactInfo();

if (isset($_POST['update'])) {
	$contact->updateContact($_POST);
	header("location:contact-info.php");
}

if (isset($_GET['delete'])) {
	$delId=$_GET['delete'];
	$contact->deleteContact($delId);
	header("location:contact-info.php");
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
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">

				<?php
				if (isset($_GET['edit'])) {

					$id=$_GET['edit'];
					$queryInfoById=$contact->getinfoById($id);
					$contactById=mysqli_fetch_assoc($queryInfoById);
					extract($contactById);

				 ?>
					<h2 class="text-center text-warning"> Update Contact Info </h2>
				<form class="form-horizontal" action="" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3">Cell No</label>
						<div class="col-md-9">
							<input type="number" name="cell_no" min="0" value="<?=$cell_no;?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">eMail</label>
						<div class="col-md-9">
							<input type="email" name="email_address" value="<?=$email_address;?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Skype</label>
						<div class="col-md-9">
							<input type="text" name="skype_address" value="<?=$skype_address;?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Web Address</label>
						<div class="col-md-9">
							<input type="text" name="web_address" value="<?=$web_address;?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Address</label>
						<div class="col-md-9">
							<textarea name="address" class="form-control"><?=$address;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Status</label>
						<div class="col-md-9">
							<select name="status" class="form-control">
								<option value="1" <?php echo $status==1?"selected":"";?> >Published</option>
								<option value="0" <?php echo $status==0?"selected":"";?> >Unpublished</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<input type="hidden" name="edit_id" value="<?=$id;?>">
							<input type="submit" name="update" value="Update Contact Info" class="form-control btn btn-success">
						</div>
					</div>
					<a href="contact-info.php" class="btn btn-danger">&laquo; Back</a>
				</form>

				<?php } else { ?>
					<h2>Save Your Contact Info </h2>
					<form class="form-horizontal" action="" method="POST">
					<div class="form-group">
						<label class="control-label col-md-3">Cell No</label>
						<div class="col-md-9">
							<input type="number" name="cell_no" min="0" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">eMail</label>
						<div class="col-md-9">
							<input type="email" name="email_address" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Skype</label>
						<div class="col-md-9">
							<input type="text" name="skype_address" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Web Address</label>
						<div class="col-md-9">
							<input type="text" name="web_address" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Address</label>
						<div class="col-md-9">
							<textarea name="address" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Status</label>
						<div class="col-md-9">
							<select name="status" class="form-control">
								<option>--Select One--</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<input type="submit" name="submit" value="Save Info" class="form-control btn btn-success">
						</div>
					</div>
				</form>

				<?php } ?>

			</div> <!-- end well -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-bordered table-straiped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Cell NO</th>
						<th>Email Address</th>
						<th>Skype Address</th>
						<th>Web Address</th>
						<th>Address</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
					while ($contactInfo=mysqli_fetch_assoc($queryResult)) {
					extract($contactInfo); ?> 
						
						<tr>
							<td><?php echo $id;?></td>
							<td><?php echo $cell_no;?></td>
							<td><?php echo $email_address;?></td>
							<td><?php echo $skype_address?></td>
							<td><?php echo $web_address;?></td>
							<td><?php echo $address?></td>
							<td>
								<?php echo $status==1?"Published":"Unpublished"?>
							</td>
							<td>
								<a href="?edit=<?=$id?>" ><span class="glyphicon glyphicon-edit text-warning bg-info bg-lg"></span></a> ||

								<a href="?delete=<?php echo $id;?>" onclick=" return confirm('Realy Do You Want to delete Parmanently ? Can not Undo !')" ><span class="glyphicon glyphicon-trash text-danger"></span> </a>

							</td>
						</tr>
						
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</div><!-- container -->


<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
	CKEDITOR.replace( 'address' );
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