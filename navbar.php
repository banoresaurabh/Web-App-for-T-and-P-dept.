<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<div class="nav navbar-default " style="background-color:white;">
			<div class="container-fluid">
				<div class = "nav navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span> 
     				 </button>
					<a href="#" class="navbar-brand" style="border: 2px solid grey;border-radius: 5px; margin-right:0.3em;">JNEC T & P</a><span class="label label-warning">Beta</span>				
				</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav nav-pills ">
					<li id="home" ><a href="index.php" style="font-family:branchFont;" >Home</a></li>
			<?php 
				if(!loggedin() && !adminloggedin()){
					echo "<li><a href='register.php' style='font-family:branchFont;'>Register</a></li>";
					echo "<li class='dropdown'>
							<a  class='dropdown-toggle' data-toggle='dropdown' href='#' style='font-family:branchFont;'>Login<span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<li><a href='login.php' style='font-family:branchFont;'>Student Login</a></li>
								<li><a href='admin-login.php' style='font-family:branchFont;'>Admin Login</a></li>
							</ul>
						</li>";
				}
				if(loggedin() || adminloggedin()){

					if(loggedin())
						echo "<li id='pro'><a href='profile.php?uno=$id&dos=$brE' style='font-family:branchFont;'>Profile</a></li>";
					if(adminloggedin())
						echo "<li id='pro'><a href='admin-profile.php' style='font-family:branchFont;'>Dashboard</a></li>";
					$fname = $_SESSION['first_name'];
					echo "
						<div class='pull-right'>
							<div class='col-md-6' style='border-right:2px solid grey'>
								<h5><span class='text-success' style='font-family:branchFont;'>$fname</span><h5>
							</div>
							
							<a style='margin-left:0.5em;'  href='logout.php'><div class='btn btn-danger' style='font-family:branchFont;'>Logout</div></a>
						
						</div>
					";
				}

			?>
			
			<li id="placed"><a href="placements.php" style='font-family:branchFont;''>Placements</a></li>
			<li id="about" style="font-family:branchFont;"><a>About</a></li>
			</ul>
			</div>
			</div>
		</div>
		
		<hr style="height:7px;background:linear-gradient(to right, #7dc57c 0, #7dc57c 16.6%, #1295c9 16.6%, #1295c9 33.2%, #815874 33.2%, #815874 49.8%, #fada58 49.8%, #fada58 66.4%, #e15554 66.4%, #e15554 83%, #ff8000 83%, #ff8000 99.6%); background-image:linear-gradient(to right, rgb(125, 197, 124) 0px, rgb(125, 197, 124) 16.6%, rgb(18, 149, 201) 16.6%, rgb(18, 149, 201) 33.2%, rgb(129, 88, 116) 33.2%, rgb(129, 88, 116) 49.8%, rgb(250, 218, 88) 49.8%, rgb(250, 218, 88) 66.4%, rgb(225, 85, 84) 66.4%, rgb(225, 85, 84) 83%, rgb(255, 128, 0) 83%, rgb(255, 128, 0) 99.6%); margin-top:0%; margin-bottom:0%;"
		/>