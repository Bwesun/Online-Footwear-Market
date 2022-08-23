<?php
include('connect.php');

session_start();




?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="popover.js"></script>
	<script type="text/javascript" language="javascript" src="alert.js"></script>
	<script type="text/javascript" language="javascript" src="collapse.js"></script>
	<script type="text/javascript" language="javascript" src="carousel.js"></script>
	<style type="text/css">
		body{
			margin-left: 3%;
			margin-right: 3%;
		}
		.nav-tabs{
			background-color: #FFFF99;
			margin-top: 1%;
			border: 1px solid #FFFF66;
		}
		#content{
			border-radius: 6px;
		}
		#profile{
			position: fixed;
			top: 20px;
			left: 82%;
			width: 60%
		}
		#wrapper{
			background-color: #FFFFCC;
		}
		#nav:hover{
			background-color: green;
			color: white;
		}
	</style>
</head>

<body>
<div id="wrapper">
	<div style="padding: 10px 0px 0px 10px;">
		<h2 class=""><font color="grey"><a href="../index.php"><img src="slide2.jpg" width="100" class="img-circle img-thumbnail"></a> Online Footwear Market</font></h2>
	</div>
		<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="products.php">Our Products</a></li>
			<li><a href="#"></a></li>
			<?php
if(isset($_SESSION['user_id'])){
	echo "
	<li><a href='my_profile.php''>My Profile</a></li>
			<li><a href='my_cart.php'>My Cart</a></li>";
}
			?>
			
			
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">About Us</a></li>
			
		</ul>
	</div>
</nav>
				
				<?php
				if(isset($_SESSION['user_id'])){
					?>
				<div id="profile" class="img-thumbnail"><span class="glyphicon glyphicon-user"></span><br>Logged in as<br> <a href="my_profile.php"><?php echo $_SESSION['username']; ?></a><br>     <a href="logout.php" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Log out of the whole Platform"><span class="glyphicon glyphicon-log-out"></span>    Logout</a>  <a class="btn btn-info" id="idd" onmousedown="bleep.play()" role="link" onclick="goBack()" title="Go to Previous Page"><span class="glyphicon glyphicon-arrow-left"></span> Back</a> </div>
				<?php
				}else{
					echo " ";
				}
				?>
				
		</div>
	<div id="content">
		<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>