
<?php
	require "core.inc.php";
	require "navbar.php";
	if(isset($_POST['sbt-btn'])){
		if(!empty($_POST['userID']) && !empty($_POST['pwd'])){
			$newUID = filter_var($_POST['user-id'],FILTER_SANITIZE_STRING);
			$newPWD = filter_var($_POST['pwd'],FILTER_SANITIZE_STRING);
			$query = " SELECT `id`,`branch` FROM `users` WHERE `userID` = 'newUID' AND `pass` = 'newPWD'";
			if($res = mysqli_query($conn,$query)){
				$row = mysqli_fetch_array($conn,$res);
				$count = mysqli_num_rows($row);
				if($count == 1){
					$id = $row['id'];
					$br = $row['branch'];
					$ = md5($br);
					$_SESSION['id'] = $id;
					header('LOCATION:admin-proile.php');
				}else{
					?>
						<script type="text/javascript">
							alert("Invalid username or password");
						</script>
					<?php
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("Some error occurred please report at banoresaurabh@gmail.com");
					</script>
				<?php
			}
		}
	}
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin - JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
</head>


<body style="background-color:#f5f5f5">
	<div class="page">
		
		<div class="body">
		<div class="col-sm-offset-3">

			<form method="POST" action="admin-login.php" class="form-horizontal " style="margin-top:12%" role = "form">
				<h2 class=" alert text-info" style="margin-left:15%">Admin Login</h2>
				<div class="form-group">
					<label class="col-sm-2 control-label" style="font-size:1.3em;"><kbd>Branch</kbd></label>
					<div class="col-md-4">
						<select class="form-control " id="element_3" name="branch"> 
								<option  selected="selected" value="" disabled selected>--Select branch-- </option>
								<option value="CIVIL" >CIVIL</option>
								<option value="MECHANICAL" >MECHANICAL</option>
								<option value="CSE" >CSE</option>
								<option value="IT" >IT</option>
								<option value="CHEMICAL" >CHEMICAL</option>
								<option value="BIOTECH" >BIOTECH</option>
								<option value="E&TC" >E&TC </option>
								<option value="EEP" >EEP</option>
								<option value="instrumentation" >INSTRUMENTATION</option>
								<option value="mca" >MCA</option>
								<option value= "architecture">Architecture</option>
						</select>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>User ID</kbd></label>
					<div class="col-sm-4">
						<input type="text" class="form-control " name="user-id"/>
					</div>
			    </div>
			    <div class="form-group">
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>Password</kbd></label>
					<div class="col-sm-4">
						<input type="password" class="form-control " name="pwd"/>
					</div>
				</div>
				</div>
				<button type="submit"  style="margin-left:37% " class="btn btn-lg btn-primary sbt-btn col-md-3">Login</button>
			</form>
		</div>


		<!----------------------------------------------Footer------------------------------------------------------------>		

		<div class="footer">
			
		
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-js.js"></script>
		</div>
	</div>
</body>
</html>