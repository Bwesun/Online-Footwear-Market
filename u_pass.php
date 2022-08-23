<?php
include('connect.php');

session_start();

	$id=$_SESSION['user_id'];
	$password=$_SESSION['password'];

	$rpass=$_POST['rpass'];
	$npass=$_POST['npass'];
	$npass2=$_POST['npass2'];
	//echo $password;
	//echo "user_id: ".$_SESSION['user_id'];


	if($rpass==$password && $npass==$npass2){
			$sql2="UPDATE users SET password='$npass'  WHERE id='$id' ";
			$result2=mysql_query($sql2);

			echo "<script>alert('Your Password has been change successfully')</script>";
			echo "<script>window.open('my_profile.php','_self')</script>";
		}
		else{
			echo "<script>alert('Your Password was not changed! Please check and try again!')</script>";
			echo "<script>window.open('my_profile.php','_self')</script>";
		}
		//echo $sql;

?>