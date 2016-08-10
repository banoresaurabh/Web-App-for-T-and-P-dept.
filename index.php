<?php
	require "core.inc.php";

	function test_data($data)
	{
		$data = trim($data);
		//$data = mysqli_real_escape_string($conn,$data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}	
	require "navbar.php";
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home | JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
	
	
</head>
<body style="background-color:#f5f5f5">

	<div class="page">
		
	<div class="well" style="height:400px;margin-top:2em;background-color:white;">

	</div>		

	<div class="well col-md-8" style="height:500px;margin-top:1em;width:68%;margin-right:1em;background-color:white;">

	</div>
	<div class="well col-md-3" style="height:500px;width:30%;margin-top:1em;background-color:white;">

	</div>				

	<div class="well col-md-5" style="height:200px;margin-top:0.8em; width:49%; background-color:white;">

	</div>
	<div class="well col-md-5" style="height:200px;margin-top:0.8em;width:49%;margin-left:1.2%;background-color:white;">

	</div>		


		<script type="text/javascript" src="js/jquery.js"></script>
		<script  type="text/javascript" src="js/jquery-js.js"></script>
		<script  type="text/javascript" src="js/bootstrap.min.js"></script>
	</div>
</body>
</html>