<?php
	require "core.inc.php";
	if(isset($_SESSION['email']) && isset($_SESSION['branchM']))
	{
		$branch = $_SESSION['branchM'];
		$num = count($_POST['compReal']);
		if($num > 0){
			$i = 0;
			$idTerm = "id_".strtolower($branch);
			while ($i < $num) {
				if(isset($_POST['compReal'][$i]) && !empty($_POST['compReal'][$i])){
					$comp = $_POST['compReal'][$i];
					$id = $_POST['realID'][$i];
					$query = "select cid from company where cname = '$comp'"; 
					if(!$result = mysqli_query($conn,$query)) echo mysqli_error($conn);
					while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){	$takenID = $row['cid'];}
					$first_name = $_POST['realFname'][$i];
					$newID = $comp.$id;
					$query="insert into placed_in (sid,cid,branch) values('$id','$takenID','$branch')";	
					if(!mysqli_query($conn,$query)){
						echo "Oops something went wrong for $id";
						echo mysqli_error($conn);
					}else{
						$query2 = "SELECT email,first_name FROM $branch WHERE $idTerm=$id";
						$queryMain = "update $branch set placed = 1 where $idTerm = $id";
						mysqli_query($conn,$queryMain);
						if($result=mysqli_query($conn,$query2)){
							$res = mysqli_fetch_array($result,MYSQLI_ASSOC);
							$em= $res['email'];
							$fname = $res['first_name'];
							$to = $em;
							$subject = "Greetings";
							$body = "Congratulations $fname, \nFor getting placed in $comp.\n All the best for your future.\n regards Training and placement dept. JNEC " ;
							$header = "From: admin@jnvwashimalumni.org";
							mail($to,$subject,$header,$body);

						}else{
							echo mysqli_error($conn);
							echo "Oops something Went wrong for email!!";
						}
						echo "Updated table for ID: $id";
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
		}
	}else{
		header('Location:404.html');
	}
?>