<?php
  
	header('Content-Type: text/xml');
			require "connect.inc.php";
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ';
	
	echo '<response>';
		$id=$_GET['id'];
		$branch = $_GET['branch'];
		$comp = $_GET['comp'];
		$query = "select cid from placed_in where cname = $comp";
		$result = mysqli_query($query,$conn);
		$row = mysqli_fetch_assoc($result,$conn);
		$takenID = $row['cid'];
		$newID = 'c'.$id;
		$query="insert into placed_in (rid,sid,cid,branch) values('$newID','$id','takenID')";
		if(!mysql_query($query)){
			echo "Oops something went wrong for $id";
		}else{
			$query2 = "SELECT email,first_name FROM branch WHERE id=$id";
			if($result=mysql_query($query2)){
				$res = mysql_fetch_array($result);
				$em= $res['email'];
				$fname = $res['first_name'];
				$to = $em;
				$subject = "Greetings";
				$body = "Congratulations $fname, \nFor getting placed in $comp.\n All the best for your future.\n regards Training and placement dept. JNEC " ;
				$header = "From: admin@jnvwashimalumni.org";
				mail($to,$subject,$header,$body);
			}else{
				echo "Oops something Went wrong for email!!";
			}
			echo "Updated table for $id";
		}
	echo '</response>';
 ?>