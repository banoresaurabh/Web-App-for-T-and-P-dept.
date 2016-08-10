<?php
	require "core.inc.php";				
				if(isset($_POST['btn-sbt-admin']))
				{
					$query="";
					if(	isset($_POST['regID']))	$regID = $_POST['regID'];				if( !empty($regID))	$query = $query." `regID` = '".$regID."' AND";
					if(	isset($_POST['first_name']))	$first_name = $_POST['first_name'];			if( !empty($first_name))	$query = $query." `first_name` = '".$first_name."' AND";
					if( isset($_POST['last_name'])) 	$last_name = $_POST['last_name'];				if(!empty($last_name) )		$query = $query." `last_name` = '".$last_name."' AND";
					if( isset($_POST['className']))		$className = $_POST['className'];						if(!empty($className) )		$query = $query." `className` = '".$className."' AND";
					if( isset($_POST['classNum']))			$classNum = $_POST['classNum'];						if(!empty($classNum) )			$query = $query." `classNum` = '".$classNum."' AND";
					if( isset($_POST['tenth']))			$tenth = $_POST['tenth']; 						if(!empty($tenth) )			$query = $query." `tenth` >= '".$tenth."' AND";
					if( isset($_POST['quali']))			$quali = $_POST['quali'];						if(!empty($quali) )			$query = $query." `quali1` = '".$quali."' AND";
					if( isset($_POST['field']))			$field = $_POST['field'];						if(!empty($field) )			$query = $query." `field1` = '".$field."' AND";
					if( isset($_POST['insti']))			$insti = $_POST['insti'];						if(!empty($insti) )			$query = $query." `insti1` = '".$insti."' AND";
					if( isset($_POST['insticity']))		$insticity = $_POST['insticity'];				if(!empty($insticity) )		$query = $query." `insticity1` = '".$insticity."' AND";
					if( isset($_POST['sector']))		$sector = $_POST['sector'];						if(!empty($sector) )		$query = $query." `sector` = '".$sector."' AND";
					if( isset($_POST['profsn'])) 		$profsn = $_POST['profsn'];						if(!empty($profsn) )		$query = $query." `profsn` = '".$profsn."' AND";
					if( isset($_POST['organ'])) 		$organ = $_POST['organ'];						if(!empty($organ) )			$query = $query." `organ` = '".$organ."' AND";
					if( isset($_POST['precountry'])) 	$organ = $_POST['precountry'];					if(!empty($precountry) )	$query = $query." `precountry` = '".$precountry."' AND";
					if( isset($_POST['city']))			$city = $_POST['city'];							if(!empty($city) )			$query = $query." `city` = '".$city."' AND";
					if( isset($_POST['village']))		$village = $_POST['village'];					if(!empty($village) )		$query = $query." `village` = '".$village."' AND";
					if( isset($_POST['taluka']))		$taluka = $_POST['taluka'];						if(!empty($taluka) )		$query = $query." `taluka` = '".$taluka."' AND";
					if( isset($_POST['dist']))			$dist = $_POST['dist'];							if(!empty($dist) )			$query = $query." `city` = '".$dist."' AND";
					
					$queryis= "SELECT * FROM `profiles` WHERE"; $query=$query.' 1';
					
					$queryis=$queryis.$query;
					if($query_run = mysql_query($queryis))
					{
						if(mysql_num_rows($query_run)==NULL)
						{
?>
							<script type="text/javascript">
							alertify.alert("\
							<img src='img/preloader.gif' style='display:block; float:left;' alt='pami' title='Mekano'>\
							\
							No Results Found :( \
							");
							</script>
<?php
						}
						else
						{	
							
							$sr = 0;
							while($query_row =mysql_fetch_assoc($query_run))
							{
								
								if($sr==0){
									echo "<div class='row'>";
								}
								$sr++;
								echo "<div class='col-md-2'  style=' text-align : center;'>";	
									
									
								$id=$query_row['id'];
								$first_name = $query_row['first_name']; $father_name = $query_row['father_name'];	$last_name = $query_row['last_name'];
								$gender = $query_row['gender'];	$batch = $query_row['batch'];	$house = $query_row['house'];	
								$quali1 = $query_row['quali1']; $field1 = $query_row['field1']; $insti1 = $query_row['insti1'];	$insticity1 = $query_row['insticity1'];
								$sector = $query_row['sector'];	$profsn = $query_row['profsn'];	$organ = $query_row['organ'];
								$precountry = $query_row['precountry']; $city = $query_row['city'];
								$village = $query_row['village'];	$taluka = $query_row['taluka'];	$dist = $query_row['dist'];
								
								$email =$query_row['email']; $linkedin=$query_row['linkedin']; $lastup=$query_row['lastup'];
								
								
								//echo'<div class="thumbnail" style="text-align:center; border:none; height: 160px; width: 140px;">
									echo '<a href="profile.php?id='.$id.'" target="_blank" >';
									
									if(file_exists('images/'.$id.'.jpg'))
									echo '<img src="images/'.$id.'.jpg" height="180px" width="160px"></a>  ';
									else
									echo '<img src="images/dummy.jpg" height="180px" width="160px"  ></a>';
									echo '<br>
									
									<span style="font-family: signikaR;color: white;">'.$first_name.' '.$last_name.'
									<br>
									'.$batch.'</span> </div>';
								if($sr==5){
									echo "</div>";
									$sr=0;
									echo '<br/>';
								}
								

							}
							
							
							$_SESSION['query']=$queryis;
		?>					
							
							<script type="text/javascript"/>
								function down(){
									window.location="export.php";
								}
								</script>
								 <button type="button" style="display:block; clear: both;position : relative;top: 20px;"  onclick="down()" name="exp">Export Results</button>
								 
	<?php		
					}
				}
				else
				{
?>
			<script type="text/javascript">
			alertify.alert("\
			<img src='img/preloader.gif' style='display:block; float:left;' alt='pami' title='Mekano'>\
			\
			Sorry an Error Occurred .\
			");
			</script>
<?php
				}
			}
	?>
	