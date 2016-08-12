<?php
	require "core.inc.php";

if(!loggedin())
{
	function encrypto($data){
		$arr = array('BIOTECH'=>"3090",'CHEMICAL'=>"3091",'CIVIL'=>"3092",'CSE'=>"3093",'E&TC'=>"3094",'EEP'=>"3095",'INSTRUMENTATION'=>"3096",'IT'=>"3097",'MECHANICAL'=>"3098");
		return $arr[$data];
	}

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
		if(!empty($_POST['userID']) && !empty($_POST['pwd']))
		{
			$newUID = test_data($_POST['userID']);
			$newPWD = test_data($_POST['pwd']);
			$newPWD = md5($newPWD);
			
			$query = " SELECT `id`,`branch` FROM `login-table` WHERE `email` = '$newUID' AND `pass` = '$newPWD'";
			if($res = mysqli_query($conn,$query))
			{	
				$count = mysqli_num_rows($res);
				if($count == 1)
				{
					$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
					$id = $row['id'];
					$br = $row['branch'];
					$brE = encrypto($br);
					$query = " SELECT `first_name`,`last_name` FROM $br WHERE `email` = '$newUID' ";
					$result = mysqli_query($conn,$query);
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$_SESSION['id'] = $id;
					$_SESSION['br'] = $brE;
					$_SESSION['first_name'] = $row['first_name'];
					$_SESSION['last_name'] = $row['last_name'];

					header('LOCATION:profile.php?uno='.$id.'&dos='.$brE);
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
				echo mysqli_error($conn);
				?>
					<script type="text/javascript">
						alert("Some error occurred please report at banoresaurabh@gmail.com");
					</script>
				<?php
			}
		}
		else
		{
				?>
					<script type="text/javascript">
						alert("Please fill in all the fields");
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
	<title>Student login - JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
</head>


<body style="background-color:#f5f5f5">
	<div class="page">
		
		<div class="body">
		<div class="col-sm-offset-3">

			<form method="POST" action="login.php" class="form-horizontal " style="margin-top:14%" role = "form">
				<h2 class=" alert text-info" style="margin-left:15%">Student Login</h2>
				<div class="form-group"> 
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>User ID</kbd></label>
					<div class="col-sm-4">
						<input type="text" class="form-control " name="userID"/> 
						<span id="errorMessageUser" class="alert alert-danger" style="display:none">Please fill out this field</span>
					</div>
			    </div>
			    <div class="form-group">
					<label class="control-label col-sm-2" style="font-size:1.3em;"><kbd>Password</kbd></label>
					<div class="col-sm-4">
						<input type="password" class="form-control " name="pwd"/>
						<span id="errorMessagePWD" class="alert alert-danger" style="display:none">Please fill out this field</span>
					</div>
				</div>
				</div>
				<button type="submit" name="sbt-btn" style="margin-left:37% " class=" btn btn-lg btn-primary col-md-3">Login</button>
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
<?php
}else{
	header('Location:home.php');
}
?>