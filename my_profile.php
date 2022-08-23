<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}


		include('head.php');

		?>




<style type="text/css">
	#online{
		padding:4px;
		background-color: #33CC00;
		border-radius: 5px;
	}
	#offline{
		padding:4px;
		background-color: #FF3300;
		border-radius: 5px;
	}
	#chat{
		text-decoration: none;
		background-color: #FF9900;
		padding: 5px;
		border-radius: 4px;
		border:1px solid orange;
	}
	#chat:hover{
		color:;
		background-color: #FF9900;
	}
	table tr th{
		border-bottom: 3px solid #CCC;
		border-right: 1px solid #FFFFFF;
	}
	table tr td{
		border-bottom: 1px solid #FFFFFF;
	}
	#td{
		border-bottom: 1px solid #ccc;
	}
	#input{
		padding: 9px 14px 9px 14px;
		border-radius: 4px;
	}
	td span{
		color:blue;
		font-weight: bold;
		font-size: 14px;
	}
	.prof{
		width: 100%;
	}
	#info{
		padding-left: 10px;
	}
</style>
<?php
$use_id=$_SESSION['user_id'];

$sql="SELECT * FROM users WHERE id='$use_id' ";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
$password=$rows['password'];
?>

<div>
	<h2>My Profile</h2>

	<div class="img-thumbnail table-striped prof" cellpadding="3px" >
		<table width="100%" class="table-striped">
			<tr>
				 
					<a href="update_profile.php?id=<?php echo $use_id; ?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>   Edit Profile</a><br></td><br>
			</tr>
			
			
			<tr>
				<td colspan="2"><span id="info">Full Name</span><br><p id="info"> <?php echo $rows['name'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Phone Number</span><br><p id="info"> <?php echo $rows['phone'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Email</span><br> <p id="info"><?php echo $rows['email'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Address</span><br> <p id="info"><?php echo $rows['address'] ;?></p></td>
			</tr>
			<tr>
				<td><span id="info">Username</span><br><p id="info"><?php echo $_SESSION['username'] ?></p></td>
				<td><span id="info"><button id="myBtn" class="btn" href="change_password.php">Change Paswword</button></span><br></td>
			</tr>
		</table>
		<fieldset>
			<legend>My Transaction Details</legend>
			<table class="table table-condensed">
				<tr>
					<th>S/N</th>
					<th>Transaction Pin</th>
					<th>Date/Time</th>
					<th>Total Price (&#x20a6)</th>
				</tr>
				<?php
				$i=1;
				$sql2="SELECT * FROM sent WHERE user_id='$use_id' ";
				$result2=mysql_query($sql2);

				while($row=mysql_fetch_assoc($result2)){
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $row['trans_pin']; ?></td>
					<td><?php echo $row['datetime']; ?></td>
					<td><?php echo number_format($row['total']); ?></td>
				</tr>
			<?php  } ?>
			</table>
		</fieldset>
	</div>
</div>

<!-- The Modal for Changing Password -->
<div id="myModal" class="modal">
	<div class="modal-dialog">
  <!-- Modal content -->
  <div class="modal-content">
  		<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="info">Change Password</h4>
			</div>
		<div class="modal-body">
				<p>Please fill the spaces below to change your password</p>
				<form class="form-group" method="post" action="u_pass.php">
				<input type="password" name="rpass" class="form-control" placeholder="Enter Current Password"><br>
				<input type="text" name="npass" class="form-control" placeholder="Enter New Password"><br>
				<input type="text" name="npass2" class="form-control" placeholder="Re-enter New Password"><br>
				<input type="submit" class="btn btn-info" name="sub" value="Submit">
				</form>
			</div>
    
  </div>
  </div>
</div> 
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} 
</script>
<?php
include('footer.php');

?>