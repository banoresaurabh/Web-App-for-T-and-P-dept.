<?php
	require "core.inc.php";
if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
{
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

<body style="background-color:#f5f5f5" >
	<div class="page">
		
		<div class="body" style="margin-top:2%;">
		
		<div class="list-group col-md-3">
			<a href="admin-profile.php" class="list-group-item active">Search Students</a>
			<a href="edit-home.php" class="list-group-item ">Change homepage contents</a>
			<a href="change-password.php" class="list-group-item ">Change password</a>
			<a href="logout.php" class="list-group-item ">Logout</a>
		</div>

		<div class = "col-md-offset-3" >
			<div  class="panel panel-default">
				<div class="panel panel-heading"><h2 class="text text-primary" style="margin-left:35%">Search students</h2>
				<p class="text text-muted" style="margin-left:25%">Get the records of the students using different filters.</p>
				</div>

				<div class="panel-body">
					
						<form action="result.php" method="post">
							<div class="form-group">
								<div class="col-md-3">
									<input type="text" name="regID" class="form-control" placeholder="Reg. number" />
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-4">
									<input type="text" name="fname" class="form-control" placeholder="First name" />
								</div>
							</div>

							<div class="form-group" >
								<div class="col-md-4">
									<input type="text" name="lname" class="form-control" placeholder="Last name" />
								</div>
							</div>

							<br/>
							<br/>
							<br/>
							<div class="form-group">
								<label> Branch<sup style="color:red;">*</sup></label>
								<select class="form-control" name="branch">
									<option  selected="selected" value="" disabled>--Select branch-- </option>
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

							<div class="form-group">
								<label> Class:</label>
								<select class="form-control" name="className">
									<option  selected="selected" value="">--Select Year-- </option>
									<option value="SE" >SE</option>
									<option value="TE" >TE</option>
									<option value="BE" >BE</option>
								</select>
							</div>

							<div class="form-group">
								<label> Division:</label>
								<select class="form-control" name="classNum">
									<option  selected="selected" value="">--Select Division-- </option>
									<option value="1" >1</option>
									<option value="2" >2</option>
									<option value="3" >3</option>
								</select>
							</div>
							<hr/>
							<div class="form-group">
								<br/>
								<label style="margin-left:3%; margin-right:3%;"><kbd>SSC: </kbd></label>
								<label style="margin-right:2%;">above 55% <input type="radio" class="commSSC" name="tenth" value="55"></label>
								<label style="margin-right:2%;">above 60% <input type="radio" class="commSSC" name="tenth" value="60"></label>
								<label style="margin-right:2%;">above 66% <input type="radio" class="commSSC" name="tenth" value="66"></label>
								<label style="margin-right:2%;">Other <input type="radio" class="commSSC" name="tenth" id="radioSSC" value="other"></label>
								<br/>
								<br/>
								<input type="text" name="otherSSC" class="form-control" id="textSSC" style="display:none;" placeholder="Enter percentages ">
							</div>


							<div class="form-group">
								<label style="margin-left:3%; margin-right:3%;"><kbd>HSC: </kbd></label>
								<label style="margin-right:2%;">above 55% <input type="radio" class="commHSC" name="hsc" value="55"></label>
								<label style="margin-right:2%;">above 60% <input type="radio" class="commHSC" name="hsc" value="60"></label>
								<label style="margin-right:2%;">above 66% <input type="radio" class="commHSC" name="hsc" value="66"></label>
								<label style="margin-right:2%;">Other <input type="radio" class="commHSC" name="hsc" id="radioHSC" value="other"></label>
								<br/><br/>
								<input type="text" name="otherHSC" class="form-control" id="textHSC" style="display:none;" placeholder="Enter percentages ">
							</div>


							<div class="form-group">
								<label style="margin-left:3%; margin-right:3%;"><kbd>Deploma: </kbd></label>
								<label style="margin-right:2%;">above 55% <input type="radio" class="commDIP" name="deploma" value="55"></label>
								<label style="margin-right:2%;">above 60% <input type="radio"  class="commDIP" name="deploma" value="60"></label>
								<label style="margin-right:2%;">above 66% <input type="radio" class="commDIP" name="deploma" value="66"></label>
								<label style="margin-right:2%;">Other <input type="radio" class="commDIP" name="deploma" id="radioDeploma" value="other"></label>
								<br/><br/>
								<input type="text" name="otherDeploma" class="form-control" id="textDeploma" style="display:none;" placeholder="Enter percentages ">
							</div>

							<div class="form-group">
								<label style="margin-left:3%; margin-right:3%;"><kbd>Engineering: </kbd></label>
								<label style="margin-right:2%;">above 55% <input type="radio" class="commENG" name="engg" value="55"></label>
								<label style="margin-right:2%;">above 60% <input type="radio" class="commENG" name="engg" value="60"></label>
								<label style="margin-right:2%;">above 66% <input type="radio" class="commENG"  name="engg" value="66"></label>
								<label style="margin-right:2%;">Other <input type="radio" class="commENG" name="engg" id="radioEngg" value="other"></label>
								<br/><br/>
								<input type="text" name="otherEngg" class="form-control" id="textEngg" style="display:none;" placeholder="Enter percentages ">
							</div>
							
							<div class="form-group">
								<label style="margin-left:3%; margin-right:3%;"><kbd>Year gap allowed?: </kbd></label>
								<label style="margin-right:2%;">Yes <input type="radio"  name="yearGap" value="yes" checked="checked"></label>
								<label style="margin-right:2%;">No<input type="radio"  name="yearGap" value="no"></label>
							</div>
							<hr/>
							<div class="alert alert-success"> <label style="margin-left:3%; margin-right:3%;">Ignore already placed:&nbsp &nbsp &nbsp<input  type="checkbox"  name="placed" value="true"></label></div>

							<button class="btn btn-danger" name="sbt-btn-admin" col-md-offset-5">Search</button>

						</form>
						
				</div>	
				
			</div>
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
	}
	else
	{
		header('Location:admin-login.php');
	}
?>