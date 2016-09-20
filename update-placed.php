	<?php
		require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{

		function encrypto($data){
					$arr = array('BIOTECH'=>"3090",'CHEMICAL'=>"3091",'CIVIL'=>"3092",'CSE'=>"3093",'E&TC'=>"3094",'EEP'=>"3095",'INSTRUMENTATION'=>"3096",'IT'=>"3097",'MECHANICAL'=>"3098");
					return $arr[$data];
		}	
		$branch = $_SESSION['branchM'];
		$idTerm = "id_".strtolower($branch);
		$queryForComp = 'select * from company';
		$compRes = mysqli_query($conn,$queryForComp);
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
				<a href="admin-profile.php" class="list-group-item ">Search Students</a>
				<a href="edit-home.php" class="list-group-item ">Change homepage contents</a>
				<a href="update-placed.php" class="list-group-item active">Placements</a>
				<a href="change-password.php" class="list-group-item ">Change password</a>
				<a href="logout.php" class="list-group-item ">Logout</a>
			</div>

			<div class = "col-md-offset-3" >
				<div  class="panel panel-default">
					<div class="panel panel-heading"><h2 class="text text-primary" style="margin-left:20%">Update the list of placed students</h2>
					
					</div>

					<div class="panel-body">
						
								<form method="POST" action="update-placed.php">
									<select name="className" class="form-control">
										<option value="SE">SE</option>
										<option value="TE">TE</option>
										<option value="BE">BE</option>
									</select>

									<select name="classNum" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
									<br/>
									<button type="submit" name="sbt-btn" class="btn btn-primary">Set class</button>
								</form>
							
								<?php

									if(isset($_POST['sbt-btn'])){
										if(isset($_POST['className']) && isset($_POST['classNum']) && !empty($_POST['className']) && !empty($_POST['classNum'])){
											$className = $_POST['className'];
											$classNum = $_POST['classNum'];
											$query = "select * from $branch where classNum = '$classNum' and className = '$className'";
											if($studRes = mysqli_query($conn,$query)){
												$count = mysqli_num_rows($studRes);
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
								<hr/>
								<form action="updater.php" id="add_name" method="get">
									<table class="table" id = "dynamic_field">
							                <thead>
							                     <tr>
							                         <th>Name of the student</th>
							                         <th>Company Name</th>
													 
							                     </tr>
							                        </thead>
													   <tbody>
													   		<tr>
													   			<td>
													   				 <select id="studName"  class="form-control" name="studName[]">
																			<option  selected="selected" value="" disabled>Select Name</option>
													  
													   					<?php
													   						while($studRow = mysqli_fetch_array($studRes,MYSQLI_ASSOC)){
																				echo '<option value="'.$studRow[$idTerm].'">'.$studRow['first_name'].' '.$studRow['last_name'].' ('.$studRow['regid'].')</option>';
																			}
													   					?>
													   				</select>
													   			</td>
													   			<td>
													   				<select name="compName[]"  class="form-control">
													   					<option  selected="selected" value="" disabled>--Select Company-- </option>
													   					<?php
													   						while($compRow = mysqli_fetch_array($compRes,MYSQLI_ASSOC)){
																				echo '<option value="'.$compRow['cname'].'">'.$compRow['cname'].'</option>';
																			}
													   					?>
													   				</select>
													   			</td>
													   			<td><button name="add" id="add" class = "btn btn-success">Add More</button></td>
													   		</tr>
							                          </tbody>
			                      </table>
			                      
						<button type="submit" class = "btn btn-success" name='btn-update' id ="btn-update">Done !!</button>
						</form>
									</div>
<?php
												}
											}
											else
											{	
													echo mysqli_error($conn);
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
				<script>
				//----------------------- The adder and remover------------------------------------//

					$(document).ready(function(){
						var i = 1;
						$('#add').click(function(){
							i++;
$('#dynamic_field').append('<td><select class="form-control" id="studName" name="studName[]"><option selected="selected" value="" disabled>Select Name</option>\<?php while($compRow = mysqli_fetch_array($compRes,MYSQLI_ASSOC)){ echo \'<option value="\'.$studRow[$idTerm].'">'.$studRow['first_name'].' '.$studRow['last_name'].' ('.$studRow['regid'].')</option>';}?></select></td>');
						});
						
						$(document).on('click','.btn_remove',function(){
							var button_id = $(this).attr('id');
							$('#row'+button_id+'').remove();
						});

						$('#btn-update').click(function(){
							$.ajax({
								url:"updater.php",
								method:"POST",
								data:$('#add_name').serialize(),
								success:function(data){
									alert(data);
									$("#add_name")[0].reset();
								}
							});
						});
					});
				</script>


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