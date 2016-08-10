<html>
	<head>
		<title>
		</title>
		<script>
			function num_fields(val){
				var str = 's';
				val = parseInt(val);
				var newVal = val*2;
				for(var i=1; i<=newVal; i++){
					var id = str.concat(i.toString());
					var x = document.getElementById(id);
					x.style.display='block';
				}
				for(i=i; i<=8; i++){
					var id = str.concat(i.toString());
					var x = document.getElementById(id);
					x.style.display='none';
				}
			}
		</script>
		
	</head>
	
	<body>
		<select onchange='num_fields(this.value);'>
			<option selected="selected">--Select--</option>
			<option value="1">2nd</option>
			<option value="2">3rd</option>
			<option value="3">4th</option>
		</select>
			<input type="text" id='s1' style="display:none;" placeholder="Semester 1">
			<input type="text" id='s2' style="display:none;;" placeholder="Semester 2">
			<input type="text" id='s3' style="display:none;;" placeholder="Semester 3">
			<input type="text" id='s4' style="display:none;" placeholder="Semester 4">
			<input type="text" id='s5' style="display:none;" placeholder="Semester 5">
			<input type="text" id='s6' style="display:none;" placeholder="Semester 6">

		</body>

</html>