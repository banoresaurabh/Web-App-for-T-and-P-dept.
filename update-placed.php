	<?php
		require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{

		function encrypto($data){
					$arr = array('BIOTECH'=>"3090",'CHEMICAL'=>"3091",'CIVIL'=>"3092",'CSE'=>"3093",'E&TC'=>"3094",'EEP'=>"3095",'INSTRUMENTATION'=>"3096",'IT'=>"3097",'MECHANICAL'=>"3098");
					return $arr[$data];
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

	<body style="background-color:#f5f5f5" >
		<div class="page">
			
			<div class="body" style="margin-top:2%;">
			
			<div class="list-group col-md-3">
				<a href="admin-profile.php" class="list-group-item active">Search Students</a>
				<a href="edit-home.php" class="list-group-item ">Change homepage contents</a>
				<a href="update-placed.php" class="list-group-item ">Placements</a>
				<a href="change-password.php" class="list-group-item ">Change password</a>
				<a href="logout.php" class="list-group-item ">Logout</a>
			</div>

			<div class = "col-md-offset-3" >
				<div  class="panel panel-default">
					<div class="panel panel-heading"><h2 class="text text-primary" style="margin-left:20%">Update the list of placed students</h2>
					
					</div>

					<div class="panel-body">
						
							<form action="update-placed.php" method="post">
								
								
							
								
								
								<div class="form-group">
									<label>Select Branch<sup style="color:red;">*</sup></label>
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

								
								<button class="btn btn-danger" name="sbt-btn" col-md-offset-5">Search</button>
								</form>
								<hr/>
								<br/>
								<?php

									if(isset($_POST['sbt-btn'])){
										if(isset($_POST['branch']) && !empty($_POST['branch'])){
											$branch = $_POST['branch'];
											$query = "select * from $branch ";
											if($result = mysqli_query($conn,$query)){
												
												$count = mysqli_num_rows($result);
												if($count == 0)
												{
													?>
														<span class="alert alert-danger">No results found</span>
													<?php
												}
												else
												{
													?>
												
								<div class="info">
									<table class="table">
							                <thead>
							                     <tr>
							                              <th>#</th>
							                              <th>First Name</th>
							                              <th>Last Name</th>
							                              <th>Class</th>
														  <th>Company</th>
							                       </tr>
							                          </thead>
													   <tbody>
													   <?php 
														  
							                        $i=0;
							                        $idTerm = "id_".strtolower($branch);
							                         while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
														 
												$reg = $row['regid'];
												$id = $row[$idTerm];
												$first_name = $row['first_name'];
												$last_name = $row['last_name'];
												$className = $row['className'];
												$classNum = $row['classNum'];
												$classFinal = $className."-".$classNum;

												$brDos = encrypto($branch);

														 
															 echo '<tr>
																   <td ><a href="profile.php?uno='.$id.'&dos='.$brDos.'" target="_blank">'.$reg.'</a></td> 
																  <td>'.$first_name.'</td>
																  <td>'.$last_name.'</td>
																  <td>'.$classFinal.'</td>
																  <td> 
																	  <select id="comp"  class="form-control" name="branch">
																			<option  selected="selected" value="" disabled>--Select Company-- </option>
																			';
																			$query = 'select * from company';
																			$compRes = mysqli_query($conn,$query);
																			
																			while($compRow = mysqli_fetch_array($compRes,MYSQLI_ASSOC)){
																				echo '<option value="'.$compRow['cname'].'">'.$compRow['cname'].'</option>';
																			}
?>
<?php
//'.$id.','.$i.',"'.$branch.'",compVal
																			echo '
																			
																		</select>
																  </td> 
																  <td><button onclick="process_approve()" class="btn btn-success active" id="greendiv'.$i.'">Update</button></td>
															</tr> 
															<div style="display:none;" class="alert alert-danger" id="result"/>
															';
														 $i++;
														 
													  }
													  
?>
							                          </tbody>
			                      </table>
						
									</div>
<?php
												}
											}
											else
											{
													echo "<div class='alert alert-danger'>Some error occurred report it to banoresaurabh@gmail.com </div>";
											}
										}
										else
										{
											?>
												<script>
													alert("Please select a branch");
												</script>
											<?php	
										}
									}
								?>

							
							
					</div>	
					
				</div>
			</div>
			<!----------------------------------------------Footer------------------------------------------------------------>		

			<div class="footer">
						
				<script type="text/javascript" src="js/jquery.js"></script>
				<script type="text/javascript" src="js/jquery-js.js"></script>
				<script type="text/javascript" src="pmdata.js"></script>
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