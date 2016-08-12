<nav class="nav navbar-default " style="background-color:white;">
			<div class="container-fluid">
				<div class = "nav navbar-header">
					<a href="#" class="navbar-brand" style="border: 2px solid grey;border-radius: 5px; margin-right:0.3em;">JNEC T & P</a><span class="label label-warning">Beta</span>				
				</div>
			
			<ul class="nav nav-pills ">
			<li id="home"><a href="index.php">Home</a></li>
			<?php 
				if(!loggedin()){
					echo "<li><a href='register.php'>Register</a></li>";
					echo "<li><a href='login.php'>Login</a></li>";
				}
				if(loggedin()){
					$id = $_SESSION['id'];
					$brE = $_SESSION['br'];

					echo "<li id='pro'><a href='profile.php?uno=$id&dos=$brE'>Profile</a></li>";
					$fname = $_SESSION['first_name'];
					$lname = $_SESSION['last_name'];
					echo "
						<div class='pull-right'>
							<div class='col-md-6' style='border-right:2px solid grey'>
								<h5><span class='text-success'>$fname</span><h5>
							</div>
							
							<a style='margin-left:0.5em;' href='logout.php'><button class='btn btn-danger'>Logout</button></a>
						
						</div>
					";
				}

			?>
			
			<li id="placed"><a>Placements</a></li>
			<li id="about"><a>About</a></li>
			</ul>
			</div>
		</nav>
		
		<hr style="height:7px;background:linear-gradient(to right, #7dc57c 0, #7dc57c 16.6%, #1295c9 16.6%, #1295c9 33.2%, #815874 33.2%, #815874 49.8%, #fada58 49.8%, #fada58 66.4%, #e15554 66.4%, #e15554 83%, #ff8000 83%, #ff8000 99.6%); background-image:linear-gradient(to right, rgb(125, 197, 124) 0px, rgb(125, 197, 124) 16.6%, rgb(18, 149, 201) 16.6%, rgb(18, 149, 201) 33.2%, rgb(129, 88, 116) 33.2%, rgb(129, 88, 116) 49.8%, rgb(250, 218, 88) 49.8%, rgb(250, 218, 88) 66.4%, rgb(225, 85, 84) 66.4%, rgb(225, 85, 84) 83%, rgb(255, 128, 0) 83%, rgb(255, 128, 0) 99.6%); margin-top:0%; margin-bottom:0%;"
		/>