<?php
include('connect.php');

session_start();


include('head.php');

?>

	<style type="text/css">
		#link{

		}
	</style>

<div class="container">
	<div class="col-md-1">
		
	</div>

	<div class="col-md-8">
		<fieldset>
			<legend>My Cart</legend>
			<table class="table table-striped table-condensed">
				
				<tr>
					<th>S/N</th>
					<th>Product Name</th>
					<th>Product Price (&#x20a6)</th>
					<th>Quantity</th>
					<th>Total Price (&#x20a6)</th>
					<th>Action</th>
				</tr>
				<?php
				$user_id=$_SESSION['user_id'];

				$i=1;
				$sql="SELECT * FROM cart WHERE user_id='$user_id' AND status='pending' ";
				$result=mysql_query($sql);

				while($rows=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $i++;  ?></td>
					<td><?php echo $rows['item_name'];  ?></td>
					<td><?php echo number_format($rows['item_price']);  ?></td>
					<td><?php echo $rows['quantity'];  ?></td>
					<td><?php echo number_format($rows['total_price']);  ?></td>
					<td>
						<form method="post">
							<input type="hidden" name="id" value="<?php echo $rows['id'];  ?>">
							<input class="btn btn-sm btn-danger" type="submit" name="remove_item" value="Remove">
						</form>
					</td>
				</tr>
				<?php
					}
					if(isset($_POST['remove_item'])){
						$id=$_POST['id'];

						$sql3="DELETE FROM `cart` WHERE `cart`.`id` = '$id'";
						$result3=mysql_query($sql3);


						if($result3){
							echo "<script>alert('Item has been Removed from your Cart!')</script>";
							//echo $sql3;
							echo "<script>window.open('my_cart.php','_self')</script>";
						}else{
							echo "<script>alert('Item has not been removed from your Cart!')</script>";
							//echo $sql3. mysql_error();
						}
					}

					$sql2="SELECT SUM(total_price) FROM cart WHERE user_id='$user_id' AND status='pending'";
					$result2=mysql_query($sql2);
					
					$rows=mysql_fetch_assoc($result2);
					$total=number_format($rows['SUM(total_price)'], 2);
					$ttotal=$rows['SUM(total_price)'];
				?>
				<tr class="active">
					<td colspan="6" class="active" align="right"><b><h3>Total Price: &#x20a6 <?php echo $total; ?></h3></b></td>
				</tr>
				<tr>
					<td colspan="6"><form method="post"><input type="submit" class="btn btn-success form-control" name="checkout" value="Checkout"></form></td>
				</tr>
			</table>
		</fieldset>
	</div>
</div>
<?php
if(isset($_POST['checkout'])){
	$sql4="UPDATE cart SET status='sent' WHERE user_id='$user_id' ";
	$result4=mysql_query($sql4);
	$number=mt_rand();
	$num= substr($number, 1, 8);

	if($result4){
		$sql5="INSERT INTO sent(user_id, trans_pin, total)VALUES('$user_id', '$num', '$ttotal') ";
		$result5=mysql_query($sql5);
		$_SESSION['trans_pin']=$num;

		echo "<script>alert('You have Successfully Checked Out!')</script>";
		//echo $sql4. mysql_error();
		echo "<script>window.open('payment.php','_self')</script>";
	}else{
		echo "<script>alert('Transaction Unsuccessful!')</script>";
		//echo $sql4. mysql_error();
	}
}

?>
	

</body>

		



<?php

include('footer.php');

?>









