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
			<table class="table">
				<tr>
					<td colspan=""><h2>Your Transaction Pin: <?php echo $_SESSION['trans_pin'] ?> </h2></td>
				</tr>
				<tr>
					<td><h3>Successful!</h3></td>
				</tr>
				<tr>
					<td><b>Payment Type: Pay on Delivery</b></td>
				</tr>
				
			</table>
		</fieldset>
	</div>
</div>

	

</body>

		



<?php

include('footer.php');

?>









