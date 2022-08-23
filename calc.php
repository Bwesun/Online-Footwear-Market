<?php
include('connect.php');


$sql="SELECT item_price FROM cart WHERE item_id='6' ";
$result=mysql_query($sql);


while($rows=mysql_fetch_assoc($result)){

	

	$item_price=$item_price+$rows['item_price'];
	echo "successful!<br>";
	echo $rows['item_price']." ".mysql_error();
}
echo "Total Price: ".$item_price;


$sql2="SELECT SUM(item_price) FROM cart WHERE item_id='6' ";
$result2=mysql_query($sql2);


$rows=mysql_fetch_assoc($result2);

	

	echo "successful!<br>";
	echo $rows['SUM(item_price)']." ".mysql_error();



?>