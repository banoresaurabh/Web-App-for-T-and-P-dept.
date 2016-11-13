	<?php
		require "core.inc.php";
	    $theBRArr = array('3090','3091','3092','3093','3094','3095','3096','3097','3098');
	    $colorArr = array('#FFB736','#49BDAA','#4155B4','#42729B','#7DC57C','#E15554','#00E5FF','#FF8000','#F4C4D5');
	if(isset($_GET['dv']) && !empty($_GET['dv']) && in_array($_GET['dv'],$theBRArr))
	{
		function encrypto($data){
					$arr = array("3090"=>'BIOTECH',"3091"=>'CHEMICAL',"3092"=>'CIVIL',"3093"=>'CSE',"3094"=>'E&TC',"3095"=>'EEP',
						"3096"=>'INSTRUMENTATION',"3097"=>'IT',"3098"=>'MECHANICAL');
					return $arr[$data];
		}	

		$branch = encrypto($_GET['dv']);
		

		require "navbar.php";
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>Placements | JNEC T&P portal</title>
		<link rel= "stylesheet" href = "css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		
		
	</head>

	<body style="background-color:#f5f5f5" >
	<div class="alert alert-info" style="text-align:center;">
		<h1 style="font-family:branchFont;"><b> &#9733 <?php echo $branch; ?> &#9733</b></h1>
	</div>
		<div class="page">
<?php
			$query = "select * from $branch where placed = 1";
			if($result = mysqli_query($conn,$query)){
				if(mysqli_num_rows($result) == 0){
					?>
						<div class="alert alert-danger" style="margin-top:8%;text-align:center;">
							No results found !
						</div>
					<?php
				}else
				{
					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$idTerm = "id_".strtolower($branch); 
						$id = $row[$idTerm];
						?>	 
							<div class="col-md-3">
            					<div class="card" style="background-color: #7DC57C;text-align: center;"/>
            						<div class="">
            						<?php
                  						if(file_exists('images/'.$id.'.jpg'))
											echo '<img src="images/'.$id.'.jpg" height="180px" width="160px";"></a>';
										else
											echo '<img src="dummy.png" style="height:210px; width:200px;" class="img-thumbnail" ; ></a>';
									?>
									</div>
                 						<b><span style="color:white; font-family:branchFont;" ><?php echo $fname." ".$lname; ?></span></b><br/>
                 						<?php
                 							$query = "select cname from company,placed_in where company.cid = placed_in.cid and sid = $id";
                 							if($resComp = mysqli_query($conn,$query)){
                 								while($rowComp = mysqli_fetch_array($resComp,MYSQLI_ASSOC)){
                 									echo '
                 										<div class="label label-danger">
                 											'.$rowComp['cname'].'
                 										</div>
                 										&nbsp 
                 									';
                 								}
                 							}else{

?>
											<div class="alert alert-danger">
												Sorry some error occurred please report at banoresaurabh@gmail.com
											</div>
<?php
                 							}
                 						?>									
            					</div>
        					</div>
						<?php
					}
				}				
			}
			else
			{
				?>
					<div class="alert alert-danger">
						Sorry some error occurred please report at banoresaurabh@gmail.com
					</div>
				<?php
			}
?>			
		</div>
			<!----------------------------------------------The Material Footer------------------------------------------------------------>		

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
			header('Location:404.php');
		}
	?>