
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>   
	<style type="text/css">
		.forFont{
			font-family: 'Open Sans', sans-serif;
		}

		.clickable-row:hover{
			cursor: pointer;
			background: rgba(73,155,234,1);
background: -moz-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(118,174,239,1) 17%, rgba(32,124,229,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(73,155,234,1)), color-stop(17%, rgba(118,174,239,1)), color-stop(100%, rgba(32,124,229,1)));
background: -webkit-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(118,174,239,1) 17%, rgba(32,124,229,1) 100%);
background: -o-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(118,174,239,1) 17%, rgba(32,124,229,1) 100%);
background: -ms-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(118,174,239,1) 17%, rgba(32,124,229,1) 100%);
background: linear-gradient(to right, rgba(73,155,234,1) 0%, rgba(118,174,239,1) 17%, rgba(32,124,229,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5', GradientType=1 );
		}	
	</style>
	<title>Search results | JNEC T&P</title>
</head>
<body style="background-color:#f5f5f5;">

<?php
	
	require "core.inc.php";	
	require "navbar.php";	
			function encrypto($data){
				$arr = array('BIOTECH'=>"3090",'CHEMICAL'=>"3091",'CIVIL'=>"3092",'CSE'=>"3093",'E&TC'=>"3094",'EEP'=>"3095",'INSTRUMENTATION'=>"3096",'IT'=>"3097",'MECHANICAL'=>"3098");
				return $arr[$data];
			}
				if(isset($_POST['sbt-btn-admin']))
				{
						if(isset($_POST['branch']) && !empty($_POST['branch']))
						{
							$branch = $_POST['branch'];
							$brDos = encrypto($branch);
							$query="";
							if(	isset($_POST['regID']))	$regID = $_POST['regID'];				if( !empty($regID))	$query = $query." `regID` = '".$regID."' AND";
							if(	isset($_POST['fname']))	$first_name = $_POST['fname'];			if( !empty($first_name))	$query = $query." `first_name` = '".$first_name."' AND";
							if( isset($_POST['lname'])) 	$last_name = $_POST['lname'];				if(!empty($last_name) )		$query = $query." `last_name` = '".$last_name."' AND";
							if( isset($_POST['className']))		$className = $_POST['className'];						if(!empty($className) )		$query = $query." `className` = '".$className."' AND";
							if( isset($_POST['classNum']))			$classNum = $_POST['classNum'];						if(!empty($classNum) )			$query = $query." `classNum` = '".$classNum."' AND";
							if(isset($_POST['tenth']) && $_POST['tenth'] != "other"){
								$tenth = $_POST['tenth'];
								if(!empty($tenth))
									$query = $query." `tenth` >= '".$tenth."' AND";
							}elseif (isset($_POST['tenth']) && $_POST['tenth'] == "other" && !empty($_POST['otherSSC'])) {
								$tenth = $_POST['otherSSC'];
								$query = $query." `tenth` >= '".$tenth."' AND";
							}	


							if( isset($_POST['hsc']) && $_POST['hsc'] != "other"){
								$hsc = $_POST['hsc'];
								if(!empty($hsc))
									$query = $query." `hsc` >= '".$hsc."' AND";
							}elseif (isset($_POST['hsc']) && $_POST['hsc'] == "other" && !empty($_POST['otherHSC'])) {
								$hsc = $_POST['otherHSC'];
								$query = $query." `twelthM` >= '".$hsc."' AND";
							}



							if( isset($_POST['deploma']) && $_POST['deploma'] != "other"){
								$deploma = $_POST['deploma'];
								if(!empty($deploma))
									$query = $query." `deploma` >= '".$deploma."' AND";
							}elseif (isset($_POST['deploma']) && $_POST['deploma'] == "other" && !empty($_POST['otherDeploma'])) {
								$deploma = $_POST['otherDeploma'];
								$query = $query." `deplomaM` >= '".$deploma."' AND";
							}



		/*					if( isset($_POST['engg']) && $_POST['engg'] != "other"){
								$engg = $_POST['engg'];
								if(!empty($engg))
									$query = $query." `engg` >= '".$engg."' AND";
							}elseif (isset($_POST['engg']) && $_POST['engg'] == "other" && !empty($_POST['engg'])) {
								$engg = $_POST['engg'];
								$query = $query." `aggreSecond` >= '".$engg."' AND";
							}

		*/

							
							if(isset($_POST['yearGap']))
							{
								if($_POST['yearGap'] == "no"){
									$query = $query." `gap` = '-1' AND";
								}
							}

							if(isset($_POST['placed'])){
								if($_POST['placed'] == "true"){
									$query = $query." `placed` = '0' AND";
								}
							}
							
							
							$queryis= "SELECT * FROM $branch WHERE "; 
							$query=$query.' 1';
							
							$queryis=$queryis.$query;
							if($query_run = mysqli_query($conn,$queryis))
							{
								if(mysqli_num_rows($query_run)==NULL)
								{
		?>
									<div class="alert alert-danger col-md-5 col-md-offset-3"  style="margin-top:5%; text-align:center;">
										<span class="forFont"><strong>No results found for your search !!</strong></span>
									</div>	
									<script>
										setTimeout(function(){ window.location = "admin-profile.php"; },5000);
									</script>
		<?php
								}
								else
								{	
									
									$sr = 0;
									echo "<div class='col-md-offset-2 col-md-8' style='background-color:white;margin-top:5%;'>";
									echo "<table class='table table-stripped'>";
									echo "
										<thead>
										    <tr>
										      <th class='forFont'> #</th>
										      <th class='forFont'>Name</th>
										      <th class='forFont'>Class</th>
										    </tr>
										 </thead>
									";
									echo "<tbody>";

									$idTerm = "id_".strtolower($branch);
									while($query_row =mysqli_fetch_array($query_run,MYSQLI_ASSOC))
									{
										
										
										$sr++;	
										$id=$query_row[$idTerm];
										$first_name = $query_row['first_name']; $last_name = $query_row['last_name'];
										$className =$query_row['className']; $classNum=$query_row['classNum']; 
										
										
										//echo'<div class="thumbnail" style="text-align:center; border:none; height: 160px; width: 140px;">
										
											//echo '<a href="profile.php?uno='.$id.'&dos='.$branch.'" target="_blank" >';
											echo '<tr class="clickable-row" data-href="profile.php?uno='.$id.'&dos='.$brDos.'" >';	
											echo '
											<th scope="row">'.$sr.'</th>
											<td>
											<span>'.$first_name.' '.$last_name.'
											</td>
											<td>
											'.$className.'-'.$classNum.'</span>
											</td>';
											echo "</tr>";
											//echo "</a>";

									}
									echo "</tbody>
									</table>";
									echo "</div>";
									$_SESSION['query']=$queryis;
				?>					
									
									<script type="text/javascript"/>
										function down()
										{
											window.location="export.php";
										}
										</script>
										 <button onclick="down()" name="exp">Import Spreedsheet </button>
			<?php		
							}
						}
						else
						{
							echo mysqli_error($conn);
						}
					}else{
						?>
<script>
					alert("Please select a branch ");
					setTimeout(function(){ window.location="admin-profile.php";},1000);							
</script>
						
						<?php
						
					}
			}
		
		?>	
		<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-js.js"></script>
	</body>