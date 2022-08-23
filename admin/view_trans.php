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
			</div>



			<div class="col-md-9">
				<fieldset>
					<legend>View Request</legend>

					<table class="table table-striped table-condensed">
				
				<tr>
					<th>S/N</th>
					<th>Product Name</th>
					<th>Product Price (&#x20a6)</th>
					<th>Quantity</th>
					<th>Total Price (&#x20a6)</th>
				</tr>
				<?php
				$user_id=$_GET['id'];

				$i=1;
				$sql="SELECT * FROM cart WHERE user_id='$user_id' AND status='sent' ";
				$result=mysql_query($sql);

				while($rows=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $i++;  ?></td>
					<td><?php echo $rows['item_name'];  ?></td>
					<td><?php echo number_format($rows['item_price']);  ?></td>
					<td><?php echo $rows['quantity'];  ?></td>
					<td><?php echo number_format($rows['total_price']);  ?></td>
				</tr>
				<?php
					}
					$sql2="SELECT SUM(total_price) FROM cart WHERE user_id='$user_id' AND status='sent'";
					$result2=mysql_query($sql2);
					
					$rows=mysql_fetch_assoc($result2);
					$total=number_format($rows['SUM(total_price)'], 2);
				?>
				<tr class="active">
					<td colspan="6" class="active" align="right"><b><h3>Total Price: &#x20a6 <?php echo $total; ?></h3></b></td>
				</tr>
				<tr>
					<td colspan="6"><form method="post"><input type="submit" class="btn btn-success form-control" name="done" value="Process"></form></td>
				</tr>
			</table>
				</fieldset>
			
<?php
if(isset($_POST['done'])){
	$sql4="UPDATE sent SET status='processing' WHERE user_id='$user_id' ";
	$result4=mysql_query($sql4);
	

	if($result4){
		echo "<script>alert('Request will be in process!')</script>";
		//echo $sql4. mysql_error();
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>alert('Error! Please try again.')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		//echo $sql4. mysql_error();
	}
}

?>
			</div>
		</div>
	</div>
</body>