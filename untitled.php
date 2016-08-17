$id = $_SESSION['id'];
		$branch = $_SESSION['br'];
		$query = "SELECT * from $branch";
		
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$first_name = $row['first_name'];$last_name = $row['last_name']; 
		$middle_name = $row['middle_name']; 
		$gender = $row['gender'];
		$dob = $row['dob']; $regId = $row['regId'];
		$adyear = $row['adyear']; 
		$year=$row['year']; 
		$className = $row['className']; 
		$classNum = $row['classNum'];$tenth=$row['tenth']; 
		if(isset($_POST['twelthM']))
			$twelth=$row['twelthM'];
		if(isset($_POST['deplomaM']))
			$deploma = $row['deplomaM']; 
		$email = $row['email'];
		$contact = $row['contact'] 
		$add = $row['add'];  