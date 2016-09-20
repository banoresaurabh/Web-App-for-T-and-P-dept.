	<?php
		require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{
		$branch = $_SESSION['branchM'];

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
									<label>Select year<sup style="color:red;">*</sup></label>
									<select class="form-control" name="className">
										<option  selected="selected" value="" disabled>--Select Year-- </option>
										<option value="SE" >SE</option>
										<option value="TE" >TE</option>
										<option value="BE" >BE</option>
									</select>
								</div>

								<div class="form-group">
									<label>Select Class<sup style="color:red;">*</sup></label>
									<select class="form-control" name="classNum">
										<option  selected="selected" value="" disabled>--Select class-- </option>
										<option value="1" >1</option>
										<option value="2" >2</option>
										<option value="3" >3</option>
										<option value="4" >4</option>
									</select>
								</div>

								
								<button class="btn btn-primary" name="sbt-btn" col-md-offset-5">Search</button>
								</form>
								<hr/>
								<br/>
								<?php

									if(isset($_POST['sbt-btn'])){
										if(isset($_POST['className']) && isset($_POST['classNum']) && !empty($_POST['classNum']) && !empty($_POST['className'])){
											$className = $_POST['className'];
											$classNum = $_POST['classNum'];
											$query = "select * from $branch where classNum = '$classNum' and className = '$className'";
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
								<form action="updater.php" method="POST">
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
																  <input type="hidden" name="realID[]" value="'.$id.'">
																  <input type="hidden" name="realFname[]" value="'.$first_name.'">
																	  <select id="comp" name="compReal[]" class="form-control" >
																			<option  selected="selected" value="" disabled>--Select Company-- </option>
																			';
																			$query = 'select * from company';
																			$compRes = mysqli_query($conn,$query);
																			
																			while($compRow = mysqli_fetch_array($compRes,MYSQLI_ASSOC)){
																				echo '<option value="'.$compRow['cname'].'">'.$compRow['cname'].'</option>';
																			}

//'.$id.','.$i.',"'.$branch.'",compVal
																			echo '
																			
																		</select>
																  </td> 
																  
															</tr> 
															<div style="display:none;" class="alert alert-danger" id="result"/>
															';
														 $i++;
														 
													  }
													  
?>
							                          </tbody>
			                      </table>
									<button type="submit" class="btn btn-success">Done!!</button>
									</form>
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