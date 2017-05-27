
<?php
	require "core.inc.php";
if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
{

	function encrypto($data){
				$arr = array('BIOTECH'=>"3090",'CHEMICAL'=>"3091",'CIVIL'=>"3092",'CSE'=>"3093",'E&TC'=>"3094",'EEP'=>"3095",'INSTRUMENTATION'=>"3096",'IT'=>"3097",'MECHANICAL'=>"3098");
				return $arr[$data];
	}
	if(isset($_POST['sbt-btn'])){
		if(!empty($_POST['cname'])){
			$cname = $_POST['cname'];
			$query = "insert into notifs (message) values('$cname')";


			if($res = mysqli_query($conn,$query)){
				echo "<div class='alert alert-success' style='text-align:center; margin-bottom:0%;'>updated successfully</div>";
			}else{

				echo "<div class='alert alert-danger' style='text-align:center;'>Some error occurred. Check whether the company you entered already exixts in the table. </div>";
			}
		}
		else{
			?>
			<script>
				alert('Please enter some text!!')
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

<body style="background-color:#f5f5f5" >
	<div class="page">

		<div class="body" style="margin-top:2%;">

		<div class="list-group col-md-3">
			<a href="admin-profile.php" class="list-group-item active">Search Students</a>
			<a href="#" class="list-group-item ">Manage nofications</a>
      <a href="comp-list.php" class="list-group-item ">Update company list</a>
			<a href="update-placed.php" class="list-group-item ">Placements</a>
			<a href="change-password.php" class="list-group-item ">Change password</a>
			<a href="logout.php" class="list-group-item ">Logout</a>
		</div>

		<div class = "col-md-offset-3" >
			<div  class="panel panel-default">
				<div class="panel panel-heading"><h2 class="text text-primary" style="margin-left:25%">Manage Notifications</h2>

				</div>

				<div class="panel-body">
					<?php
						$query = "select * from notifs";
						if($result = mysqli_query($conn,$query)){
							if(mysqli_num_rows($result) <= 0){
								echo "<div class='alert alert-danger'>No Notifications till now!!</div>";
							}
							else{
							?>
									<table class = "table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th style="font-family: 'Open Sans', sans-serif;">Notification</th>
                        <th style="font-family: 'Open Sans', sans-serif;">Action</th>
											</tr>
										</thead>
										<tbody>

							<?php
              $i = 1;
							while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
								$id = $i;
                $idReal = $row['notif_id'];
								$cname = $row['message'];
								echo '<tr>';
								echo '
                    <td>'.$id.'</td>
                    <td style="font-family: \'Open Sans\', sans-serif;">'.$cname.'</td>
                    <td><a href="notifDeleter.php?id='.$idReal.'"><button class="btn btn-primary">Remove</button></a></td>
                    ';
								echo '</tr>';
                $i++;
							}
							echo '</tbody>
								</table>';
							}
								?>
								<hr/>
								<br/>
								<h4 style="margin-left:1%;font-family: 'Open Sans', sans-serif;">Add new Notifications</h4>
								<form method="POST" action="manageNotifs.php">
									<div class="form-group">
										<div class="">
											<input type="text" name="cname" class="form-control" placeholder="Enter notification" />
										</div>
										<br/>
										<button class="btn btn-danger" name="sbt-btn" >Add</button>
									</div>
								</form>
								<?php


						}else{
							echo mysqli_error($conn);
							echo "<div class='alert alert-danger'>Some error occurred report it to banoresaurabh@gmail.com </div>";
						}

					?>


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
