<head>
	<title>Update Profile</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="modal.js"></script>
</head>

<body>
<div id="myModal1" class="form-group">
	<div class="modal-dialog">
  <!-- Modal content -->
  <div class="modal-content">
  		<div class="modal-header">
				<a href="my_profile.php" class="close">&times;</a>
				<h4 class="modal-title" id="info">Update Profile</h4>
			</div>
		<div class="modal-body">
<?php
include('connect.php');



if(isset($_POST['sub'])){
	$user=$_POST['user_id'];

	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];

	$sql2 = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE `users`.`id` = '$user' LIMIT 1;";
	$result2=mysql_query($sql2);
	//echo $sql2;

	if($result2){
		echo "<script>alert('Your Profile has been Updated Successfully!')</script>";
		echo "<script>window.open('my_profile.php','_self')</script>";
		
	}
	else{
		echo "<script>alert('Your Profile was not Updated. Please Try Again!')</script>";
			
	}
}

$user_id=$_GET['id'];
$sql="SELECT * FROM users WHERE id='$user_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);

?>
		<form class="form-group" method="post">
				Full Name
				<input type="text" name="name" class="form-control" value="<?php echo $rows['name']; ?>" required><br>
				Phone Number
				<input type="text" name="phone" class="form-control" value="<?php echo $rows['phone']; ?>" required><br>
				Email
				<input type="email" name="email" class="form-control" value="<?php echo $rows['email']; ?>" required><br>
				Address
				<textarea name="address" class="form-control"><?php echo $rows['address']; ?></textarea><br>
				<input type="hidden" name="user_id" value="<?php echo $rows['id']; ?>">
				Username (Note: You cannot change your username)
				<font class="form-control"><?php echo $rows['username']; ?></font>
					<div>
						<input type="submit" class="btn btn-info" name="sub" value="Update">  <a class="btn btn-danger"  href="my_profile.php">Cancel</a>
					</div>
				</form>
			</div>
    
  </div>
  </div>
</div> 

<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>