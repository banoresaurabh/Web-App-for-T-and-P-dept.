<!doctype html>
<html>
	<head>
	<script type="text/javascript">
		function valSetter(theVal){
			<?php $comp = echo 'theVal';?>
		}	
	</script>
	</head>

	<body>
		<div class="form-group">
								<label>Select Branch<sup style="color:red;">*</sup></label>
								<select onchange="valSetter(this.value)" class="form-control" name="branch">
									<option  selected="selected" value="" disabled>--Select branch-- </option>
									<option value="CIVIL" >CIVIL</option>
									<option value="MECHANICAL" >MECHANICAL</option>
									<option value="CSE" >CSE</option>
									<option value="IT" >IT</option>
									<option value="CHEMICAL" >CHEMICAL</option>
									<option value="BIOTECH" >BIOTECH</option>
									<option value="E&TC" >E&TC </option>
									<option value="EEP" >EEP</option>
									<option value="instrumentation" >INSTRUMENTATION</option>
									<option value="mca" >MCA</option>
									<option value= "architecture">Architecture</option>

								</select>
		</div>
		
			<script>
				alert(<?php echo $comp; ?>);
			</script>
		
	</body>
</html>