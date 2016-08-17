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

	if(isset($_POST['sbt-btn']))
	{
		if(!empty($_POST['userID']) && !empty($_POST['pwd']) && !empty($_POST['branch']))
		{
			$newUID = test_data($_POST['userID']);
			$newPWD = test_data($_POST['pwd']);
			$newPWD = md5($newPWD);
			$branch = $_POST['branch']; 
			$query = "SELECT * FROM `br_master` WHERE `email` = '$newUID' AND `keyword` = '$newPWD' AND `branch` =  '$branch' ";
			
			if($res = mysqli_query($conn,$query))
			{
				$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
				$count = mysqli_num_rows($res);
				
				if($count == 1)
				{
					$email = $row['id'];
					$fname = $row['fname'];
					$_SESSION['email'] = $email;
					$_SESSION['first_name'] = $fname;
					$_SESSION['branchM'] = $branch;
					header('LOCATION:admin-profile.php');
				}
				else
				{
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
		else{
?>
					<script type="text/javascript">
						alert("Please fill in all the fields.");
					</script>
<?php
		}
	}
	require "navbar.php";

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
			<form method="POST" action="admin-login.php" class="form-horizontal " style="margin-top:12%" >
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
						</select>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>User ID</kbd></label>
					<div class="col-sm-4">
						<input type="text" class="form-control " name="userID"/>
					</div>
			    </div>
			    <div class="form-group">
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>Password</kbd></label>
					<div class="col-sm-4">
						<input type="password" class="form-control " name="pwd"/>
					</div>
				</div>
				</div>
				<button type="submit"  style="margin-left:37%" name="sbt-btn" class="btn btn-lg btn-primary col-md-3">Login</button>
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