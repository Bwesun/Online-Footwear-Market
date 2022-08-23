<?php



?>
<head>
<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="../jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../bootstrap.min.js"></script>

<?php
if(isset($_SESSION['admin_user'])){
	
}

?>
<a class="btn btn-info" id="idd" onmousedown="bleep.play()" role="link" onclick="goBack()" title="Go to Previous Page"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>