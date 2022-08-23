<?php
session_start();
include('head.php');

include('connect.php');

$user_id=$_SESSION['user_id']

?>
<style type="text/css">
    <?php
    include('onecss.php');
    ?>
</style>


<div class="row">
<div class="col-md-6" style="border-right: 3px solid green; overflow-y: scroll; height: 800px;">
    <div class="">
<h2 class="c-section-headline l-section-headline">
    <span class="c-section-headline__text">SHOES CATEGORY</span>
</h2>
</div>
	<div>
<?php
$sql3="SELECT * FROM items WHERE category='shoes' ORDER BY id DESC LIMIT 0, 8; ";
$result3=mysql_query($sql3);

while($rows=mysql_fetch_assoc($result3)){

?>


			<figure class="img-thumbnail" width="400">
				<div style="width: 300px; padding-left:5px;">
					<div style=" float: left;">
						<a href="">
							<img src="images/<?php echo $rows['pic']; ?>" width="200"><br>
    <span><?php echo $rows['name'];  ?></span><br>
  </a> 
            <span>  &#x20a6 <?php echo number_format($rows['price']); ?> </span><br>
            <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="hidden" name="item_name" value="<?php echo $rows['name']; ?>">
                                    <input type="hidden" name="item_price" value="<?php echo $rows['price']; ?>">
                                    <?php
                                    if(isset($_SESSION['user_id'])){
                                    ?>
                                    <input type="text" placeholder="Enter Quantity" name="quantity">
                                    <input type="submit" class="btn btn-success btn-sm" name="sub_buy" value="Order">
                                    <input type="submit" class="btn btn-warning" name="add_to_cart" value="Add 1 Quantity to Cart">
                                    <?php
                                    
                                    }else{
                                        echo "Login to Buy";
                                        echo '<a href="login.php" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>  Login</a>';
                                    }
                                    ?>
                                </form>
				</div>
			</div>
			</figure>
<?php
}
?>
<!--
	<a href="" class="btn btn-bg btn-lg" id="a" style="border:1px solid orange;">
		<font color="#02b290"><h4>NILEST Shoes   <span class="glyphicon glyphicon-arrow-right"></span></h4></font><font color="grey">See More</font>
	</a>
-->
</div>
</div>




<div class="col-md-6"  style="overflow-y: scroll; height: 800px;">
    <div class="">
<h2 class="c-section-headline l-section-headline">
    <span class="c-section-headline__text">BOOTS CATEGORY</span>
</h2>
</div>
    <div>
<?php
$sql3="SELECT * FROM items WHERE category='boots' ORDER BY id DESC LIMIT 0, 8; ";
$result3=mysql_query($sql3);

while($rows=mysql_fetch_assoc($result3)){

?>


            <figure class="img-thumbnail" width="400">
                <div style="width: 300px; padding-left:5px;">
                    <div style=" float: left;">
                        <a href="view_item.php?id=<?php echo $rows['id']; ?>">
                            <img src="images/<?php echo $rows['pic']; ?>" width="150"><br>
    <span><?php echo $rows['name'];  ?></span><br>
  </a>
            <span>  &#x20a6 <?php echo number_format($rows['price']); ?></span><br>
            <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="hidden" name="item_name" value="<?php echo $rows['name']; ?>">
                                    <input type="hidden" name="item_price" value="<?php echo $rows['price']; ?>">
                                    <?php
                                    if(isset($_SESSION['user_id'])){
                                    ?>
                                    <input type="text" placeholder="Enter Quantity" name="quantity">
                                    <input type="submit" class="btn btn-success btn-sm" name="sub_buy" value="Order">
                                    <input type="submit" class="btn btn-warning" name="add_to_cart" value="Add 1 Quantity to Cart">
                                    <?php
                                    
                                    }else{
                                        echo "Login to Buy";
                                        echo '<a href="login.php" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>  Login</a>';
                                    }
                                    ?>

                                </form>
            </div>
            </figure>
<?php
}
?>
<?php
if(isset($_POST['sub_buy'])){
    $item_id=$_POST['id'];
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    $user_id=$_SESSION['user_id'];
    $status='pending';
    $quantity=$_POST['quantity'];
    $total_price=$item_price*$quantity;

    $sql="INSERT INTO cart(item_id, item_name, item_price, user_id, status, quantity, total_price)VALUES('$item_id', '$item_name', '$item_price', '$user_id', '$status', '$quantity', '$total_price') ";
    $result=mysql_query($sql);
    //echo $sql; echo mysql_error();

    if($result){
        echo "<script>alert('Item Added to Cart!')</script>";
        //echo $sql;
        echo "<script>window.open('my_cart.php', '_self')</script>";
    }else{
        echo "<script>alert('Item Not Added to Cart!')</script>";
        //echo $sql;
        echo "<script>window.open('products.php', '_self')</script>";
    }
}


if(isset($_POST['add_to_cart'])){
    $item_id=$_POST['id'];
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    $user_id=$_SESSION['user_id'];
    $status='pending';
    $quantity=1;
    $total_price=$item_price*$quantity;

    $sql="INSERT INTO cart(item_id, item_name, item_price, user_id, status, quantity, total_price)VALUES('$item_id', '$item_name', '$item_price', '$user_id', '$status', '$quantity', '$total_price') ";
    $result=mysql_query($sql);
    echo $sql; echo mysql_error();

    if($result){
        echo "<script>alert('Item Added to Cart!')</script>";
        echo $sql;
        //echo "<script>window.open('products.php', '_self')</script>";
    }else{
        echo "<script>alert('Item Not Added to Cart!')</script>";
        //echo $sql;
        //echo "<script>window.open('products.php', '_self')</script>";
    }
}

?>
<!--
    <a href="" class="btn btn-bg btn-lg" id="a" style="border:1px solid orange;">
        <font color="#02b290"><h4>NILEST Boots   <span class="glyphicon glyphicon-arrow-right"></span></h4></font><font color="grey">See More</font>
    </a>
-->
</div></figure></div></div></div>


<?php
include('footer.php');