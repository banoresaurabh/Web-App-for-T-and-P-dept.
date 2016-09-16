<?php
	
	require 'core.inc.php';	

	$time = time();	$file = "export".date(':dmY_His', $time).".xls";
	if(!isset($_SESSION['query'])){
		header('Location: home.php');
	}else{
		$query = $_SESSION['query'];
		if($result = mysqli_query($conn,$query)){
		
			header("Content-Type:application/xls");
			header("Content-Disposition:attachment;filename=$file");
			header("Pragma:no-cache");
			header("Expires:0");
			
			$sep="\t";
		
			echo "Sr\tFirst name\tFather name\tLast name\tGender\tBatch\treg ID\tDOB\tBranch\tYear\tClass\tContact Number\tEmail\tAddress\tTenth\tTwelth\tDiploma\tSem 1\tSem 2\tAggregate\tSem 3\tSem 4\tAggregate\tSem 5\tSem 6\tAggregate\tGap\tCo Curri\tExtra curri";
			
			print("\n");
			$sr=0;
			while($query_row =mysqli_fetch_array($result,MYSQLI_ASSOC)){
				$sr++;
				$first_name = $query_row['first_name']; $father_name = $query_row['middle_name'];	$last_name = $query_row['last_name'];
				$gender = $query_row['gender'];	$batch = $query_row['adyear'];	$regID = $query_row['regid'];	$dob = $query_row['dob'];
				$branch = $query_row['branch']; $year = $query_row['year']; 
				$tenth = $query_row['tenth'];$contact = $query_row['contact'];	$email = $query_row['email'];$address = $query_row['address'];	

				if($query_row['twelthM'] != -1)
					$twelthM  = $query_row['twelthM'];
				else
					$twelthM = "NA";

				if($query_row['deplomaM'] != -1)
					$deplomaM  = $query_row['deplomaM'];
				else
					$deplomaM = "NA";

				if($query_row['sem1M'] != -1)
					$sem1M  = $query_row['sem1M'];
				else
					$sem1M = "NA";

				if($query_row['sem2M'] != -1)
					$sem2M  = $query_row['sem2M'];
				else
					$sem2M = "NA";


				if($query_row['sem3M'] != -1)
					$sem3M  = $query_row['sem3M'];
				else
					$sem3M = "NA";

				if($query_row['sem4M'] != -1)
					$sem4M  = $query_row['sem4M'];
				else
					$sem4M = "NA";

				if($query_row['sem5M'] != -1)
					$sem5M  = $query_row['sem5M'];
				else
					$sem5M = "NA";

				if($query_row['sem6M'] != -1)
					$sem6M  = $query_row['sem6M'];
				else
					$sem6M = "NA";
				
				if($query_row['aggreFirst'] != -1)
					$aggreFirst  = $query_row['aggreFirst'];
				else
					$aggreFirst = "NA";

				if($query_row['aggreThird'] != -1)
					$aggreThird  = $query_row['aggreThird'];
				else
					$aggreThird = "NA";

				if($query_row['aggreSecond'] != -1)
					$aggreSecond  = $query_row['aggreSecond'];
				else
					$aggreSecond = "NA";

				if($query_row['gap'] != -1)
					$gap  = $query_row['gap'];
				else
					$gap = "NA";

				$className = $query_row['className'];
				$classNum = $query_row['classNum'];
				$class = $className."-".$classNum;
				
				$extracurri = $query_row['extra-curri'];	$cocurri = $query_row['co-curri'];	
			
				$string = "\t";
				$string = $string.$sr."\t".$first_name."\t".$father_name."\t".$last_name."\t".$gender."\t".$batch."\t".$regID."\t".$dob."\t".$branch."\t".$year."\t".$class."\t".$contact."\t".$email."\t".$address."\t".$tenth."\t".$twelthM."\t".$deplomaM."\t".$sem1M."\t".$sem2M."\t".$aggreFirst."\t".$sem3M."\t".$sem4M."\t".$aggreSecond."\t".$sem5M."\t".$sem6M."\t".$aggreThird."\t".$gap."\t".$cocurri."\t".$extracurri;
				
				echo $string;
				print("\n");
			}
			
		}else{
			echo mysqli_error($conn);

?>
		<script type="text/javascript">
		alert("Sorry an Error ocurred.");
		</script>
<?php
		}
		//session_destroy();
	}
?>