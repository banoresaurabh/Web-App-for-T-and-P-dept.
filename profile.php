<?php

	require "core.inc.php";
	require "connection.php";
	function encrypto($data){
		$arr = array("3090"=>'BIOTECH',"3091"=>'CHEMICAL',"3092"=>'CIVIL',"3093"=>'CSE',"3094"=>'E&TC',"3095"=>'EEP',"3096"=>'INSTRUMENTATION',"3097"=>'IT',"3098"=>'MECHANICAL');
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

if(isset($_SESSION['id']) && isset($_SESSION['br']))
{
	if(isset($_GET['uno']) && isset($_GET['dos']))
	{

		$id = test_data($_GET['uno']);
		$br = encrypto(test_data($_GET['dos']));
		$idTerm = "id_".strtolower($br);
		$query = "SELECT * FROM `$br` WHERE `$idTerm` = '$id'";
		$result = mysqli_query($conn,$query);		
	//$query2 = "SELECT `email` FROM `login-table` WHERE `id` = '$id'";
	if(mysqli_num_rows($result) == 0)
	{	
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$first_name = $row['first_name'];
		$email = $row['email'];
		$last_name = $row['last_name'];
		$middle_name = $row['middle_name'];
		$regID = $row['regid'];
		$adYear = $row['adyear'];
		$dob = $row['dob'];
		$year = $row['year'];
		$className = $row['className'];
		$classNum = $row['classNum'];
		$tenth = $row['tenth'];
		$twelthM = $row['twelthM'];
		$deplomaM = $row['deplomaM'];
		$contact = $row['contact'];
		$address = $row['address'];
		$sem1 = $row['sem1M'];
		$sem2 = $row['sem2M'];
		$sem3 = $row['sem3M'];
		$sem4 = $row['sem4M'];
		$sem5 = $row['sem5M'];
		$sem6 = $row['sem6M'];
		$extra = $row['extra-curri'];
		$co = $row['co-curri'];
		$aggreFirst = $row['aggreFirst'];
		$aggreSecond = $row['aggreSecond'];
		$aggreThird = $row['aggreThird'];
		$placed = $row['placed'];		
	}
	else
	{
?>
					<script type="text/javascript">
						window.location = "404.html";
					</script>
<?php
	}


	require "navbar.php";
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> <?php echo $first_name." ".$last_name ?> | JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>   
	<style type="text/css">
		.forFont{
			font-family: 'Open Sans', sans-serif;
		}
	</style>
	<script>
		document.getElementById('pro').className = "active";
	</script>
</head>


<body style="background-color:#f5f5f5">
	
	<div class="page" style="width:1100px;">	
		<div class="body">
		
		<div class="list-group col-md-3" style="margin-right:0em;">
			<a href="admin-profile.php" class="list-group-item active">My profile</a>
			<a href="admin-profile.php" class="list-group-item ">Update profile</a>
			<a href="change-password.php" class="list-group-item ">Change password</a>
			<a href="logout.php" class="list-group-item ">Logout</a>
		</div>


		<div class="col-md-offset-3 " style="background-color:white; margin-top: 4em; ">
		<hr style="height:10px; background: repeating-linear-gradient(
			45deg,
    		#ffa500,
    		#ffa500 10px,
    		#fada58 10px,
    		#fada58 20px
		);"
		/>
		<div class="head-info col-md-8">
			<h1 class="forFont"><?php echo $first_name ." ".$last_name ?></h1> 
			<div>
				<p class="forFont text text-muted" style="font-size: 1.2em;"><?php echo "(".$regID.")" ?></p>
				<p class="forFont text text-muted" style="font-size: 1.2em; line-height:0px;"><?php $br = ucfirst(strtolower($br)); echo $br." ".$className."-".$classNum; ?></p>
				<p class="forFont text text-muted" style="font-size: 1.2em; line-height:20px;"><?php echo $email ?></p>
				<p class="forFont text text-muted" style="font-size: 1.2em; line-height:3px;"><?php echo $contact ?></p>
			</div>
		</div>
		<div class="pic" >
			<img src="dummy.png" height="150" width="150" style="border:0.1em solid white;margin-top:1em;">
		</div>
			<hr style="margin-top:4em;">
			
			<div style="margin:2em;">
				
				
				<h3 class="text text-primary ">Academic details </h3>

				<table  style="margin-top:2em;" class="table table-striped">
				  <thead>
				    <tr>
				      <th class="forFont"> #</th>
				      <th class="forFont">Class</th>
				      <th class="forFont">Marks</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td class="forFont">Tenth</td>
				      <td class="forFont"><?php echo $tenth." %" ?></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td class="forFont">Twelth</td>
				      <td class="forFont"><?php if($twelthM != "-1.00") echo $twelthM." %"; else echo "NA"; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td class="forFont">Diploma</td>
				      <td class="forFont"><?php if($deplomaM != "-1.00") echo $deplomaM." %"; else echo "NA"; ?></td>
				    </tr>
				  </tbody>
				</table>
				

				<table  style="margin-top:3em;" class="table table-striped">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th class="forFont ">Semester</th>
				      <th class="forFont">Percentage</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td class="forFont">Sem 1</td>
				      <td class="forFont"><?php if($sem1 != "-1.00") echo $sem1." %"; else echo "NA"; ?></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td class="forFont">Sem 2</td>
				      <td class="forFont"><?php if($sem2 != "-1.00") echo $sem2." %"; else echo "NA"; ?></td>
				    </tr>
				     <tr >
				      <th scope="row"></th>
				      <td class="forFont text-info"><b>Aggregate</b></td>
				      <td class="forFont text-info"><b><?php if($aggreFirst != "-1.00") echo $aggreFirst." %"; else echo "NA"; ?></b></td>
				    </tr>
				    <br/>
				    <tr>
				      <th scope="row" class="forFont">3</th>
				      <td class="forFont">Sem 3</td>
				      <td class="forFont"><?php if($sem3 != "-1.00") echo $sem3." %"; else echo "NA"; ?></td>
				    </tr>

				    <tr>
				      <th scope="row">4</th>
				      <td class="forFont">Sem 4</td>
				      <td class="forFont"><?php if($sem4 != "-1.00") echo $sem4." %"; else echo "NA"; ?></td>
				    </tr>

				    <tr>
				      <th scope="row"></th>
				      <td class="forFont text-info"><b>Aggregate</b></td>
				      <td class="forFont text-info"><b><?php if($aggreSecond != "-1.00") echo $aggreSecond." %"; else echo "NA"; ?></b></td>
				    </tr>

				    <tr>
				      <th scope="row">5</th>
				      <td class="forFont">Sem 5</td>
				      <td class="forFont"><?php if($sem5 != "-1.00") echo $sem5." %"; else echo "NA"; ?></td>
				    </tr>

				    <tr>
				      <th scope="row">6</th>
				      <td class="forFont">Sem 6</td>
				      <td class="forFont"><?php if($sem6 != "-1.00") echo $sem6." %"; else echo "NA"; ?></td>
				    </tr>

				    <tr>
				      <th scope="row"></th>
				      <td class="forFont text-info"><b>Aggregate</b></td>
				      <td class="forFont text-info"><b><?php if($aggreThird!= "-1.00") echo $aggreThird." %"; else echo "NA"; ?></b></td>
				    </tr>
				  </tbody>
				</table>
				<hr/>
				<div class="e-and-c" style="margin-top:2em; margin-bottom:;">
					<h3 class="text text-primary ">Miscellaneous </h3>
					<span class="text-muted">Extra curricular</span><br/>
					<span class="forFont"><?php echo $extra ?> </span><br/>
					<span class="text-muted">Co curricular</span> <br/>
					<span class="forFont"><?php echo $co ?> </span>
				</div>
				<br/> <br/> <br/>
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
		header('Location:404.php');
	}
}
else
{
	header('Location:login.php');
}	
?>
