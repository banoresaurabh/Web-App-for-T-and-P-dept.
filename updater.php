<?php
	require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{
<<<<<<< HEAD
		$branch = $_SESSION['branchM'];

		if(isset($_POST['compReal']) && count($_POST['compReal']) > 0){
			$i = 0;
			$idTerm = "id_".strtolower($branch);
			while ($i < count($_POST['compReal'])) {
				if(isset($_POST['compReal'][$i]) && !empty($_POST['compReal'][$i])){
					$comp = $_POST['compReal'][$i];
					$id = $_POST['realID'][$i];
					$query = "select cid from company where cname = '$comp'";
					if(!$result = mysqli_query($conn,$query)) echo mysqli_error($conn);
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){	$takenID = $row['cid'];}
					$first_name = $_POST['realFname'][$i];
					$newID = $comp.$id;

					if(!mysqli_query($conn,$query)){
						echo "Oops something went wrong for $id";
						echo mysqli_error($conn);
					}else{
						$query2 = "SELECT email,first_name,placed FROM $branch WHERE $idTerm=$id";

						if($result=mysqli_query($conn,$query2)){
							$res = mysqli_fetch_array($result,MYSQLI_ASSOC);
							$placed = $res['placed'];
							if($placed == 0){
								$query = "update branch_wise_count set count = count + 1 where branch = $branch";
								try {
									mysqli_query($conn,$query);
								} catch (Exception $e) {
									echo "Oops something went wrong please report it to the Webmaster !!";
								}

							}
							$em= $res['email'];
							$fname = $res['first_name'];
							$to = $em;
							$subject = "Greetings";
							$body = "Congratulations $fname, \nFor getting placed in $comp.\n All the best for your future.\n regards Training and placement dept. JNEC " ;
							$header = "From: admin@jnvwashimalumni.org";
							mail($to,$subject,$header,$body);
							try {
								$queryMain = "update $branch set placed = 1 where $idTerm = $id";
								mysqli_query($conn,$queryMain);
							} catch (Exception $e) {
								echo "Oops something went wrong please report it to the Webmaster !!";
							}

						}else{
							echo mysqli_error($conn);
							echo "Oops something Went wrong for email!!";
						}
						?>
							<script>
								setTimeout(1000,alert("Records updated successfully"));
							</script>
						<?php
						//header('Location:update-placed.php');
					}
					$i++;
				}
						}
					}else{
			?>
				<script>
					alert("Please enter all the detais");
					location.href = "update-placed.php"
				</script>
			<?php
=======
		$numberName = count($_POST["name"]);
		$numberComp = count($_POST["comp"]);
		if($numberName > 1 && $numberComp > 1){
			for($i = 0; $ $i < $numberName; $i++){
				if(trim($_POST["name"][$i]) != ''){

				}else{
					
				}
			}
		}else{
			echo "Please Enter the name "
>>>>>>> master
		}
	}else{
		header('Location:404.html');
	}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> master
