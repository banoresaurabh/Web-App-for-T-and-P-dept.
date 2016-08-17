<?php
	require "core.inc.php";
//-----------------------------------The goddamn connection ----------------------------------------------------------//
/*
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "t_and_p";
	global $conn;
	if($conn = new mysqli($host,$user,$pass,$db))
	{

	}
*/
//---------------------------------------------------------------------------------------------------------------------//

	function test_data($data){
		$data = trim($data);
		//$data = mysqli_real_escape_string($conn,$data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}
	
if(loggedin()){

		$id = $_SESSION['id'];
		$branch = $_SESSION['br'];
		$query = "SELECT * from $branch";
		
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$first_name = $row['first_name'];$last_name = $row['last_name']; 
		$middle_name = $row['middle_name']; 
		$gender = $row['gender'];
		$dob = $row['dob']; $regId = $row['regId'];
		$adyear = $row['adyear']; 
		$year=$row['year']; 
		$className = $row['className']; 
		$classNum = $row['classNum'];$tenth=$row['tenth']; 
		if(isset($_POST['twelthM']))
			$twelth=$row['twelthM'];
		if(isset($_POST['deplomaM']))
			$deploma = $row['deplomaM']; 
		$email = $row['email'];
		$contact = $row['contact'] 
		$add = $row['add'];  
		$sem1=test_data($_POST['sem1']); $sem2=test_data($_POST['sem2']);
		$sem3=test_data($_POST['sem3']); $sem4=test_data($_POST['sem4']); $sem5=test_data($_POST['sem5']); $sem6=test_data($_POST['sem6']); 
		$eCurri = test_data($_POST['eCurri']);
		$coCurri = test_data($_POST['coCurri']);
		$gapAnswer = $_POST['yearGap'];
		
		
		if(!empty($first_name) && !empty($last_name) && !empty($middle_name) && !empty($gender) && !empty($dob) && !empty($regId) && 
			!empty($adyear) && !empty($branch) && !empty($year) && !empty($className) && !empty($classNum)  && !empty($tenth) && 
			!empty($email) && !empty($password) && !empty($password_confirm) && !empty($contact) && !empty($add) && !empty($eCurri) && !empty($coCurri) )
		 {	 
		 	 $flag1=0; $flag2 = 0;$checkCount = 0;$twelthM = -1;$deplomaM = -1;
		 	 $sem1M = -1; $sem2M = -1; $sem3M = -1; $sem4M = -1; $sem5M = -1; $sem6M = -1; 
		 	 $aggreFirst = -1;$aggreSecond = -1;$aggreThird = -1;

			 if($year==1)
			 {
				 if(!isset($_POST['check-deploma']) && !empty($sem1) && !empty($sem2) ){
				 	$flag1++;
				 	$sem1M = $sem1; $sem2M = $sem2;	
				 	$aggreFirst = ($sem1M + $sem2M)/2;
				 }
				 else if(isset($_POST['check-deploma'])){
				 	$flag1++;
				 }
			 }
			 else if($year==2)
			 {
				 if(!isset($_POST['check-deploma']) && !empty($sem1) && !empty($sem2) && !empty($sem3) && !empty($sem4))
				 {  
				 	$flag1++;
				 	$sem1M = $sem1; $sem2M = $sem2; $sem3M = $sem3; $sem4M = $sem4;
				 	$aggreFirst = ($sem1M + $sem2M)/2;
				 	$aggreSecond = ($sem3M + $sem4M)/2;
				 }
				 else if(isset($_POST['check-deploma']) && !empty($sem3) && !empty($sem4))
				 {	
				 	$flag1++;
				 	$sem3M = $sem3; $sem4M = $sem4;
				 	$aggreSecond = ($sem3M + $sem4M)/2;	
				 }
			 }
			 elseif($year==3)
			 {
				  if(!isset($_POST['check-deploma']) && !empty($sem1) && !empty($sem2) && !empty($sem3) && !empty($sem4) && !empty($sem5)){
				  		$flag1++;
				  		$sem1M = $sem1; $sem2M = $sem2; $sem3M = $sem3; $sem4M = $sem4; $sem5M = $sem5;
				  		 
				 		$aggreFirst = ($sem1M + $sem2M)/2;
				 		$aggreSecond = ($sem3M + $sem4M)/2;
				 		$counter = 5;
				  		if(isset($_POST['sem6'])){
				  			$sem6M = $sem6;
				  		}  
				  } 
				  else if(isset($_POST['check-deploma']) && !empty($sem3) && !empty($sem4) && !empty($sem5)){
				  		$flag1++;
				  		$sem3M = $sem3; $sem4M = $sem4; $sem5M = $sem5; 
				 		$aggreSecond = ($sem3M + $sem4M)/2;
				 		if(isset($_POST['sem6'])){
				  			$sem6M = $sem6; 
				  		}  
				  } 
			 }
			 $gapFlag = 0;
			 $gapSelect = -1;
			 if($sem6M != -1 && $sem5M != -1){
			 	$aggreThird = ($sem6M + $sem5M)/2;
			 }
			 if($gapAnswer == 1 && !empty($_POST['gapSelect'])){
			 	$gapSelect = $_POST['gapSelect'];
			 	$gapFlag = 1;
			 }
			 elseif ($gapAnswer == 0) {
			 	$gapFlag = 1;
			 }
			 if(isset($_POST['check-twelth']))
			 {
			 	$checkCount++;
			 	if(!empty($twelth))
			 	{
			 		$flag2++;
			 		$twelthM = test_data($twelth);
			 	}
			 }
			 if(isset($_POST['check-deploma']))
			 {
			 	$checkCount++;

			 	if(!empty($deploma))
			 	{
			 		$flag2++;
			 		$deplomaM = test_data($deploma);
			 	}
			 }
			


			 if($checkCount != 0)
			 {

				if($checkCount == $flag2 && $gapFlag != 0)
				{
					if($flag1 != 0)
					{
						if($password == $password_confirm)
						{

							if(strlen($password) >= 6)
							{
								$email = filter_var($email,FILTER_SANITIZE_EMAIL);
								if(filter_var($email,FILTER_VALIDATE_EMAIL) == true)
								{

									$queryForDuplicates = "SELECT `first_name` FROM `$branch` WHERE  `regId` = '$regId'  OR `email` = '$email'";
									if($result = @mysqli_query($conn,$queryForDuplicates))
									{
										if(mysqli_num_rows($result) == 0)
										{
											$password = md5($password);
											$query = "INSERT INTO $branch (first_name,middle_name,last_name,gender,dob,regId,adyear,branch,year,
											className,classNum,tenth,twelthM,deplomaM,contact,email,address,sem1M,sem2M,aggreFirst,sem3M,
											sem4M,aggreSecond,sem5M,sem6M,aggreThird,gap,`extra-curri`,`co-curri`,placed) VALUES('$first_name','$middle_name','$last_name','$gender','$dob','$regId','$adyear','$branch','$year','$className','$classNum','$tenth',
											'$twelthM','$deplomaM','$contact','$email','$add','$sem1M','$sem2M','$aggreFirst','$sem3M','$sem4M','$aggreSecond','$sem5M','$sem6M','$aggreThird','$gapSelect','$eCurri','$coCurri','0')";


												if($result = mysqli_query($conn,$query))
												{
													$idTerm = "id_".strtolower($branch);
													$queryForID = "SELECT $idTerm FROM $branch WHERE `regId` = '$regId'";
													if($re = mysqli_query($conn,$queryForID))
													{
														$row = mysqli_fetch_array($re,MYSQLI_ASSOC);
														$id = $row[$idTerm];
														
														$queryForInsertion = "INSERT INTO `login-table` (email,pass,branch,id) VALUES('$email','$password','$branch','$id')";
														if($result = mysqli_query($conn,$queryForInsertion))
														{
}

?>
															<script>
																alert("Done!!");
															</script>
<?php	
														}else
														{
															echo mysqli_error($conn);
														}
													}
													else
													{
														echo mysqli_error($conn);
													}
												}
												else
												{
													echo mysqli_error($conn);
?>
													<script>
														alert("Some error occurred");
													</script>
<?php	
												}
										}
										else
										{
?>
												<script>
													alert("The email id or registration is already registered");
												</script>
<?php																				
										}
									}
									else
									{
										echo mysqli_error($conn);
									}

								}
								else
								{
?>
									<script>
										alert("Enter a valid email id");
									</script>
<?php	 
								}
//----------------------------------------------------------------6---------------------------------------------------------//
							}
							else
							{
?>
								<script>
									alert("Passwords must be atleast 6 characters long");
								</script>
<?php	
							}
//--------------------------------------------------------5------------------------------------------------------------
						}
						else
						{
?>
							<script>
								alert("The passwords do not match");
							</script>
<?php	
						}
//------------------------------------------------------------4--------------------------------------------//
					}
					else
					{
?>
						<script>
							alert("Please fill out the marks for respective semesters");
						</script>
<?php	
					}
//-----------------------------------------------------------------3------------------------------------------------------//
				}
				else
				{
?>
					<script>
						alert("Please fill in all the fields");
					</script>
<?php
				}
//-------------------------------------------------2------------------------------------------------------------//
			 }
			 else
			 {
?>

				<script>
					alert("Please fill in all the fields1");
				</script>
<?php
			}

//----------------------------------1----------------------------------------------------------------------------------------//
		}
		else
		{
?>
			<script>
				alert("Please fill in all the fields2");
			</script>
<?php
		}
	
	require "navbar.php";
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register | JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
	
		
	<!----------------------------------------------Function for yearwise percentages-------------------------------------------------------->
	<script>
			document.getElementById('register').className = "active";
			function num_fields(val){
				var str = 's';
				val = parseInt(val);
				var newVal = val*2;
				for(var i=1; i<=newVal; i++){
					var id = str.concat(i.toString());
					var x = document.getElementById(id);
					x.style.display='block';
				}
				for(i=i; i<=8; i++){
					var id = str.concat(i.toString());
					var x = document.getElementById(id);
					x.style.display='none';
				}
			}
	</script>
	
	
</head>
<body style="background-color:#f5f5f5">
<div id="legend" style="text-align:center">
	<legend class="alert alert-success">Update profile</legend>
</div>
	<div class="page">
		
		<div class="body" >
				<form  class="form-vertical" action='register.php' method="POST">
				  	


		<!----------------------------------------------Personal Details------------------------------------------------------------>	
			

			<br/>
			<legend class="text text-primary">Personal Details</legend>	
			<div class="well" style="background-color:white;">			
						
						<div style="margin-bottom:3em;">
						</div>

						<div class="form-group" style="">
						  <div class=" col-xs-4">
						  	<label>First Name: </label>
							<input type="text"  name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>" placeholder="" class="form-control">
						  </div>
						</div>
					   
						
						<div class="form-group">
							<div class="col-xs-4">
						  		<label >Father's Name: </label>
								<input type="text"  name="middle_name" value="<?php if(isset($_POST['middle_name'])) echo $_POST['middle_name'];?>" placeholder="" class="form-control">
							</div>
						</div>
					
						<div class="form-group">
						 <div class="col-xs-4">
							<label >Last Name: </label>
							<input type="text"  name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>" placeholder="" class="form-control">
						  </div>
						</div>

						<div class="form-group" style="margin-top:8em;">
						  <label class="control-label">Gender: </label>
						  <div class="controls">
							Male: <input type="radio" name="gender" value="Male" class="">&nbsp
							&nbsp
							Female: <input type="radio" name="gender" value="Female" class="">
						  </div>
						</div>




						<div class="form-group" style="">
						  <label class="control-label">Date of Birth</label>
						  <div class="controls">
							<input type="date" name="dob" value="<?php if(isset($_POST['dob'])) echo $_POST['dob'];?>" placeholder="" class="form-control">
						  </div>
						</div>
		
		</div>

<!----------------------------------------------Educational Details------------------------------------------------------------>
	<br/>
	<legend class="text text-primary">Educational details</legend>		
			<div class="well" style="background-color:white">
			
						
						<div class="form-group"> 
						  <label >Registration Id:</label>
							<input type="text" class="form-control" name="regId" value="<?php if(isset($_POST['regId'])) echo $_POST['regId'];?>"/>
						</div>


						<div class="form-group">
						  <div class="col-md-6">
							<label class="control-label">Admission Year</label>
							<select name="adyear" class="form-control"  >
								<option selected="selected" value="<?php if(isset($_POST['adyear'])) echo $_POST['adyear'];?>" disabled selected> --Select Year-- </option>
								<option value="2010-11">2010-11</option>
								<option value="2011-12">2011-12</option>
								<option value="2012-13">2012-13</option>
								<option value="2013-14">2013-14</option>
								<option value="2014-15">2014-15</option>
								<option value="2015-16">2015-16</option>
							</select>
							</div>
						</div>
						
						<div class="form-group">
						  <div class="col-md-6">
							<label class="control-label">Branch</label>
							<select class="form-control" id="element_3" name="branch"> 
								<option  selected="selected" value="<?php if(isset($_POST['branch'])) echo $_POST['branch'];?>" disabled selected>--Select branch-- </option>
								<option value="CIVIL" >CIVIL</option>
								<option value="MECHANICAL" >MECHANICAL</option>
								<option value="CSE" >CSE</option>
								<option value="IT" >IT</option>
								<option value="CHEMICAL" >CHEMICAL</option>
								<option value="BIOTECH" >BIOTECH</option>
								<option value="EXTC" >E&TC </option>
								<option value="EEP" >EEP</option>
								<option value="INSTRUMENTATION" >INSTRUMENTATION</option>
								<option value="mca" >MCA</option>
								<option value= "architecture">Architecture</option>
							</select>
						  </div>
						</div>
						
						

						<div class="form-group">
						  <div class="col-md-6">
						  <label class="control-label">Year</label>
							<select name="year"  id="yearID"  class="form-control" onchange='num_fields(this.value);'>
								<option  selected="selected" value="<?php if(isset($_POST['year'])) echo $_POST['year'];else echo "0"; ?> " disabled selected> --Select Year-- </option>
								<option value="1">2nd</option>
								<option value="2">3rd</option>
								<option value="3">4th</option>
							</select>
							<div >
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem1'])) echo $_POST['sem1'];?>" name="sem1" id='s1' style="display:none;" placeholder="Semester 1 (Leave it blank if direct 2nd year)">
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem2'])) echo $_POST['sem2'];?>" id='s2' name="sem2" style="display:none;;" placeholder="Semester 2 (Leave it blank if direct 2nd year)">
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem3'])) echo $_POST['sem3'];?>" id='s3' name="sem3" style="display:none;;" placeholder="Semester 3">
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem4'])) echo $_POST['sem4'];?>" id='s4' name="sem4" style="display:none;" placeholder="Semester 4">
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem5'])) echo $_POST['sem5'];?>" id='s5' name="sem5" style="display:none;" placeholder="Semester 5 ">
								<input type="text" class="form-control" value="<?php if(isset($_POST['sem6'])) echo $_POST['sem6'];?>" id='s6' name="sem6" style="display:none;" placeholder="Semester 6 (optional)">
								
								</div>
						  </div>
						</div>


						
						<div class="form-group">
						  <br/>
						  <div class="col-md-6">
						  <label class="control-label">Class</label>
						  <div id="autoGenerateClass"  class="bg-danger"></div>
						  <input type="hidden" id="hiddenInpID" name="hiddenInp" value="<?php if(isset($_POST['hiddenInp'])) echo $_POST['hiddenInp'];?>">
							<select name="classNum" class="form-control" >
								<option  selected="selected" value="<?php if(isset($_POST['classNum'])) echo $_POST['classNum'];?>"> --Select Division-- </option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								
							</select>
							</div>
						</div>
						

						<div class="form-group" style="margin-top:13%">
						    <label class="col-md-12" >Any year gap? </label>
						    <div style="margin-left:2%">
								Yes: <input  type="radio" class="comm" id="gap" name="yearGap" value="1"> &nbsp &nbsp &nbsp
								No: <input  type="radio" name="yearGap"  class="comm" value="0">
							</div>
						 </div>

						 <div class="form-group" id="gapSelectID" style="display:none">
						  <div class="col-md-6">
							<select name="gapSelect"  class="form-control"  >
								<option selected="selected" value="<?php if(isset($_POST['gapSelect'])) echo $_POST['gapSelect'];?>" disabled selected> --Specify Year of gap-- </option>
								<option value="2010-11">2010-11</option>
								<option value="2011-12">2011-12</option>
								<option value="2012-13">2012-13</option>
								<option value="2013-14">2013-14</option>
								<option value="2014-15">2014-15</option>
								<option value="2015-16">2015-16</option>
							</select>
							</div>
						</div>


						<div class="form-group" style="margin-top:1%">
						    <label class="col-md-12" >10th Marks:</label>
							<input step="any" type="number"  placeholder="Enter percentage" class="form-control" name="tenth" value="<?php if(isset($_POST['tenth'])) echo $_POST['tenth'];?>">
						 </div>
						
						
						<div class="form-group">
						  <label class="control-label" for="email">12th Marks</label>
						  <div class="controls">
							<input step="any" type="checkbox" name="check-twelth" id="twelth"/>
						  </div>
						</div>
						<div id="twelth-input" style="display:none" >
							<input type="number" step="any" name="twelthM" class="form-control " placeholder = "Enter percentage" value="<?php if(isset($_POST['twelthM'])) echo $_POST['twelthM'];?>"/>
						</div>
						<div class="form-group">
						  <label class="control-label " for="email">Deploma Marks</label>
						  <div class="controls">
							<input  type="checkbox" name="check-deploma" id="deploma"/>
						  </div>
						</div>
						<div id="deploma-input"  style="display:none">
							<input type="number" step="any" name="deplomaM" class="form-control" placeholder = "Enter percentage" value="<?php if(isset($_POST['deplomaM'])) echo $_POST['deplomaM'];?>"/>

						</div>
	
	
				</div>

<!----------------------------------------------Conatact Details------------------------------------------------------------>		
	<br/>
	<legend class="text text-primary">Contact details</legend>
		<div class="well" style="background-color:white">
						<div class="form-group">
						  <label class="control-label">Email</label>
						  <div class="controls">
							<input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="" cclass="form-control" >
						  </div>
						</div>
					 
											
						<div class="form-group">
						  <label class="control-label">Contact number</label>
						  <div class="controls">
							<input type="number"  class="form-control" name="contact" value="<?php if(isset($_POST['contact'])) echo $_POST['contact'];?>" placeholder="" >
						  </div>
						</div>
						
						
						<div class="form-group">
						  <!-- E-mail -->
						  <label class="control-label">Permanent address</label>
						  <div class="controls">
							<textarea name="add"  rows="5" cols="40" placeholder="" class="input-xlarge form-control"> <?php if(isset($_POST['add'])) echo $_POST['add'];?></textarea>
						  </div>
						</div>
					 
							
				</div>




				<!----------------------------------------------Misc Details------------------------------------------------------------>		
	<br/>
	<legend class="text text-primary">Other details</legend>
		<div class="well" style="background-color:white">
		
			<div class="form-group ">
				<label class="control-label">Extra curricular Activities</label>
					<div class="controls">
							<textarea name="eCurri"  rows="4" cols="30" placeholder="" class="form-control "> <?php if(isset($_POST['eCurri'])) echo $_POST['eCurri'];?></textarea>
					</div>
			</div>		

			<br/>

			<div class="form-group ">
				<label class="control-label">Co-curricular Activities</label>
					<div class="controls">
							<textarea name="coCurri"  rows="4" cols="30" placeholder="" class="form-control "> <?php if(isset($_POST['coCurri'])) echo $_POST['coCurri'];?><?php if(isset($_POST['coCurri'])) echo $_POST['coCurri'];?></textarea>
					</div>
			</div>	
			<div class="form-group">
					<div class="controls" style="height:5%">
				 			<input type="submit" name="sbt-btn" style="height:150%" class="btn btn-lg btn-primary col-md-offset-4 col-md-3" value="Update" />
					</div>
			</div>	
		</div>	
	</form>

		<script type="text/javascript" src="js/jquery.js"></script>
	<script  type="text/javascript" src="js/jquery-js.js"></script>

		<!----------------------------------------------Footer------------------------------------------------------------>		

	
	</div>
</body>
</html>
<?php
}
else{
	header('Location:login.php');	
}
?>