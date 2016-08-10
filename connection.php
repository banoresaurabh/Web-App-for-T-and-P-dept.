<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "t_and_p";
	
		if($conn =  mysqli_connect($host,$user,$pass,$db))
		{
?>
			

<?php
		}

		else
		{
?>
			<script>
				alert(<?php echo mysqli_error($conn) ?>);
			</script>
<?php
		}
?>