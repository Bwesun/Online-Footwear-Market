<?php
session_start();
include('connect.php');

if(!isset($_SESSION['admin_user'])){
	echo "<script>alert('Please Login as An Admin')</script>";
	echo "<script>window.open('login.php', '_self')</script>";
	
}

include('head.php');
?>

<table class="table navbar navbar-default navbar-fixed-top">
	<tr>
		<th><a href="index.php" >Home</a></th>
		<th><a href="logout.php" >Logout</a></th>
	</tr>
</table>
<br>
<br>
<br>
<br>
<style type="text/css">
	body{
		margin: 1%;
	}
	.col-md-2 a{
	    padding:8px; 
	    background-color: #eeeeee;
	}
	.col-md-2 a:hover{
	    color: white;
	    background-color: #66CC99;
	    font-weight: bolder;
	}
</style>

<body>
		<div class="row">
			<div class="col-md-2">
				<br>
				<br>
				<br>
				<a href="index.php" class="form-control">View Orders</a><br>
				<a href="add_item.php" class="form-control">Add Item</a><br>
				<a href="users.php" class="form-control">Users</a><br>
			</div>



			<div class="col-md-9">
				<h2>Orders</h2>
			<table class="table table-condensed table-striped">
				<tr>
					<th>S/N</th>
					<th>Transaction Pin</th>
					<th>Date/Time</th>
					<th>Total Price</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?php
					$i=1;
					$sql="SELECT * FROM sent WHERE status!='finish' ORDER BY id DESC ";
					$result=mysql_query($sql); 
					$count=mysql_num_rows($result);
if($count>0){
					while($rows=mysql_fetch_assoc($result)){

				?>
				<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $rows['trans_pin'];  ?></td>
						<td><?php echo $rows['datetime'];  ?></td>
						<td><?php echo number_format($rows['total']);  ?></td>
						<td>
							<?php 
							$status=$rows['status'];

							if($status=='processing'){
								echo '<button class="btn btn-warning">Processing</button> ';
							}elseif($status==''){
								echo '<button class="btn btn-danger">Pending</button>';
							}elseif($status=='finish'){
								echo '<button class="btn btn-success">Finished</button>';
							}
							?>
						</td>
						<td><a role="link" href="view_trans.php?id=<?php echo $rows['user_id'];  ?>" class="btn btn-primary">View</a>  
							<?php
								if($status=='processing'){
									?>
							<form method="post">
						 	<input type="hidden" name="user_id" value="<?php echo $rows['user_id'];  ?>">
						 	<input type="hidden" name="trans_pin" value="<?php echo $rows['trans_pin'];  ?>">
						 	<input type="submit" name="sub_done" class="btn btn-success" value="Finish" title="Click if processing has been accomplished">
						 </form>

						 <?php
								}

							if(isset($_POST['sub_done'])){
								$user_id=$_POST['user_id'];
								$trans_pin=$_POST['trans_pin'];

								$sql4="UPDATE sent SET status='finish' WHERE user_id='$user_id' AND trans_pin='$trans_pin' ";
								$result4=mysql_query($sql4);
								

								if($result4){
									echo "<script>alert('Done!')</script>";
									//echo $sql4. mysql_error();
									echo "<script>window.open('index.php','_self')</script>";
								}else{
									echo "<script>alert('Error! Please try again.')</script>";
									echo "<script>window.open('index.php','_self')</script>";
							}
							}
							?>
						 </td>
						 
				</tr>
				<?php
					}
}else{
	echo '<tr>
					<td colspan="6"><font color="grey" size="14">No Available Request!</font></td>
				</tr>';
}
				?>
				
			</table>

			</div>
		</div>
	</div>
</body>