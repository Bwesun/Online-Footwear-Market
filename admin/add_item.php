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
				<a href="view_complaints.php" class="form-control">View Complaints</a><br>
			</div>



			<div class="col-md-9">
				<h2>Add Item</h2>

				<fieldset>
					<legend>Add Item Form</legend>
					<form class="form-group" method="post" enctype="multipart/form-data">
						<input type="text" name="name" placeholder="Item Name" required class="form-control"><br>
						<input type="text" name="price" placeholder="Item Price" required class="form-control"><br>
						<select name="category" class="form-control"  required>
							<option value="">---- Select Category ----</option>
							<option value="Shoes">Shoes</option>
							<option value="Boots">Boots</option>
						</select><br>
						<textarea class="form-control" required name="description" placeholder="Item Description"></textarea><br>
						Select Item Picture
						<input type="file" name="pic" class="form-control" required><br>
						<div align="center">
							<input type="submit" name="item_sub" class="btn btn-info" value="Add Item">   <input type="reset" class="btn btn-warning" name="" value="Clear All">
						</div>
					</form>
				</fieldset>

				<?php
				if(isset($_POST['item_sub'])){

					$name=$_POST['name'];
					$price=$_POST['price'];
					$category=$_POST['category'];
					$description=$_POST['description'];
					$pic=$_POST['pic'];

					$filename=$_FILES['pic']['name'];
					move_uploaded_file($_FILES['pic']['tmp_name'], "../images/".$_FILES['pic']['name']);

					$sql="INSERT INTO items(name, price, category, description, pic)VALUES('$name', '$price', '$category', '$description', '$filename') ";
					$result=mysql_query($sql);

					if($result){
						echo "<script>alert('Item Added Successfully!')</script>";
						//echo $sql;
						echo "<script>window.open('add_item.php', '_self')</script>";
					}else{
						echo "<script>alert('Item Not Added!')</script>";
						//echo $sql;
						echo "<script>window.open('add_item.php', '_self')</script>";
					}

					
				}

				?>
			
				<fieldset>
					<legend>Available Items</legend>
					<?php
						$sql2="SELECT * FROM items ORDER BY id DESC";
						$result2=mysql_query($sql2);

						
						?>
					<figure>
						<table class="table table-condensed table-striped">
							<tr>
								<th>S/N</th>
								<th>Item Name</th>
								<th>Item Price</th>
								<th>Category</th>
								<th>Description</th>
								<th>Item Picture</th>
								<th>Action</th>
							</tr>
							<?php
							$i=1;
							while($rows=mysql_fetch_assoc($result2)){
							?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $rows['name']; ?></td>
								<td><?php echo $rows['price']; ?></td>
								<td><?php echo $rows['category']; ?></td>
								<td><?php echo $rows['description']; ?></td>
								<td><img src="../images/<?php echo $rows['pic']; ?>" width="100"></td>
								<td><form class="" method="post">
									<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
									<input type="submit" class="btn btn-danger" name="sub_delete_item" value="Delete">
								</form></td>
							</tr>
							<?php
					}
					?>
						</table>
					</figure>
					<?php
								if(isset($_POST['sub_delete_item'])){
									$item_id=$_POST['id'];

									$sql3="DELETE FROM items WHERE id='$item_id' ";
									$result3=mysql_query($sql3);

									if($result3){
										echo "<script>alert('Delete Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('add_item.php', '_self')</script>";
									}else
										echo "<script>alert('Delete not Successfull!')</script>";
										//echo $sql;
										echo "<script>window.open('add_item.php', '_self')</script>";
								}
								?>
					
				</fieldset>

			</div>
		</div>
	</div>
</body>