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
				<h2>Users</h2>
			<table class="table table-condensed table-striped">
				<tr>
					<th>S/N</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Address</th>
					<th>Customer Type</th>
				</tr>
				<?php
					$i=1;
					$sql="SELECT * FROM users ORDER BY id DESC ";
					$result=mysql_query($sql); 
					$count=mysql_num_rows($result);

					while($rows=mysql_fetch_assoc($result)){
				?>
				<tr>
						<td><?php echo $i++;  ?></td>
						<td><?php echo $rows['name'];  ?></td>
						<td><?php echo $rows['phone'];  ?></td>
						<td><?php echo $rows['email'];  ?></td>
						<td><?php echo $rows['address'];  ?></td>
						<td><?php echo $rows['customer_type'];  ?></td>
				</tr>
				<?php
					}
				?>
			</table>

			</div>
		</div>
	</div>
</body>