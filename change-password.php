<?php

	require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{
		if(isset($_POST['sbt-btn']))
		{
			function test_data($data)
			{
				$data = trim($data);
				//$data = mysqli_real_escape_string($conn,$data);
				$data = htmlspecialchars($data);
				$data = stripcslashes($data);
				return $data;
			}

			if(!empty($_POST['curr_pass']) && !empty($_POST['pass']) && !empty($_POST['conf_pass']))
			{
			$email = test_data($_SESSION['email']);
			$curr_pass = test_data($_POST['curr_pass']);
			$pass = test_data($_POST['pass']);
			$conf_pass = test_data($_POST['conf_pass']);
			$curr_pass = md5($curr_pass);
			$query = " SELECT * FROM `br_master` WHERE `keyword` = '$curr_pass' ";
			try 
			{
				$result = mysqli_query($conn,$query);
				
			if(mysqli_num_rows($result) > 0)
			{
				if($pass == $conf_pass)
				{
					$pass = md5($pass);
					$queryMain = "UPDATE `br_master` SET `keyword` = '$pass' WHERE `email` = '$email' ";
					try 
					{
						if($result = mysqli_query($conn,$queryMain)){
?>
							<div class="alert alert-success" style="margin-bottom:0px; text-align:center;"><b><p>Password updated successfully!</p></b></div>
<?php	
						}
						else
						{
?>
							<div class="alert alert-danger" style="margin-bottom:0px; text-align:center;"><b><p>Some internal error occurred while updating the password please report it to the webmaster !</p></b></div>
<?php	

						}

					} 
					catch (Exception $e)
					{
?>
						<div class="alert alert-danger" style="margin-bottom:0px; text-align:center;"><b><p>Some internal error occurred while updating the password please report it to the webmaster !</p></b></div>
<?php	
					}
				}
				else
				{
?>
					<script>
						alert("The new passwords you entered do not match, please try again ");
					</script>
					<div class="alert alert-danger" style="margin-bottom:0px; text-align:center;"><b><p style="">The new passwords you entered do not match, please try again </p></b></div>
<?php	
	
				}
			}
			else
			{
?>
				<script>
					alert("The current password you entered is incorrect");
				</script>
				<div class="alert alert-danger" style="margin-bottom:0px; text-align:center;"><b><p>The current password you entered is incorrect please try again!</p></b></div>
<?php	
			} 
			} 
			catch (Exception $e) 
			{
?>
				<div class="alert alert-danger" style="margin-bottom:px;"><p>Some internal error occurred please report it to the webmaster !</p></div>
<?php
			}
			
			}
			else
			{
?>
				<div class="alert alert-danger" style="margin-bottom:0px; text-align:center;"><b><p>Please fill in all the fields</p></b></div>
<?php	
			}

			
		}
		require "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Student login - JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
</head>


<body style="background-color:#f5f5f5">
	<div class="page">
		
		<div class="body">
		<div class="col-sm-offset-3">

			<form method="POST" action="change-password.php" class="form-horizontal " style="margin-top:14%" role = "form">
				<h2 class=" alert text-info" style="margin-left:15%">Change Password</h2>
				<div class="form-group"> 
					<label class="control-label col-sm-2" style="font-size:1.0em;">Current </label>
					<div class="col-sm-4">
						<input type="password" placeholder="Enter current password" class="form-control " name="curr_pass"/> 
					</div>
			    </div>
			    <div class="form-group">
					<label class="control-label col-sm-2" style="font-size:1.0em;">New</label>
					<div class="col-sm-4">
						<input type="password" placeholder="Enter new password" class="form-control " name="pass"/>
						<span id="errorMessagePWD" class="alert alert-danger" style="display:none">Please fill out this field</span>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2" style="font-size:1.0em;">Confirm </label>
					<div class="col-sm-4">
						<input type="password" placeholder="Confirm password" class="form-control " name="conf_pass"/>
					</div>
				</div>
				</div>
				<button type="submit" name="sbt-btn" style="margin-left:37% " class=" btn btn-lg btn-primary col-md-3">Submit</button>
			</form>
		</div>


		<!----------------------------------------------Footer------------------------------------------------------------>		

		<div class="footer">
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-js.js"></script>
		</div>
	</div>
<?php	
	}
	else
	{
		header('Location:404.html');
	}
?>
