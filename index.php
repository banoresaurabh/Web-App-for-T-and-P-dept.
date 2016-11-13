<?php
	require "core.inc.php";

	function test_data($data)
	{
		$data = trim($data);
		//$data = mysqli_real_escape_string($conn,$data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}
	require "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home | JNEC T&P portal</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel= "stylesheet" href = "css/bootstrap.css">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">

		// Load the Visualization API and the corechart package.
		google.charts.load('current', {'packages':['corechart']});

		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawCompanyWiseChart);
		google.charts.setOnLoadCallback(drawBranchWiseChart);
		notifier();
		function notifier(){
			$.ajax({
				url:'notifSender.php',
				type:'POST',
				async:true,
				success:function(theSimpleResponse){
					document.getElementById('notifications').innerHTML = theSimpleResponse;
				}
			});
		}
		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.

		function drawBranchWiseChart() {
			var data = new google.visualization.DataTable();

			data.addColumn('string','Branch');
			data.addColumn('number','Count');
			var dataRowArray = [];
			$.ajax({
				url: 'getDataForChart.php',
				type: 'POST',
				async: false,
				success:function(jsonData){
					for (var i = 0; i < jsonData.length; i++) {
						branchName = jsonData[i].branch;
						counter = parseInt(jsonData[i].count);
						dataRowArray.push([branchName,counter]);
					}
				}
			});

			/*var jsonData = $.getJSON("getDataForChart.php",function(){
				for (var i = 0; i < jsonData.responseJSON.length; i++) {
					branchName = jsonData.responseJSON[i].branch;
					counter = parseInt(jsonData.responseJSON[i].count);
					dataRowArray.push([branchName,counter]);
				}
			});*/


			/*$.each(function(i,jsonData) {
					dataRowArray.push([jsonData.responseJSON[i].branch,jsonData.responseJSON[i].count]);
			});*/
			//var str = dataRowArray.toString();
		 //	alert(str);
			data.addRows(dataRowArray);
			var options={
				'title':'Branch Wise placements ',
				'width':500,
				'height':400,
				'pieHole':0.4
			};
			var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
			chart.draw(data,options);
		}

		function drawCompanyWiseChart() {
			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string','company');
			data.addColumn('number','Count');
			var dataRowArray = [];
			$.ajax({
				url: 'getDataForChartCompany.php',
				type: 'POST',
				async:false,
				success:function(jsonDataSet){
					for (var i = 0; i < jsonDataSet.length; i++) {
						branchName = jsonDataSet[i].company;
						counter = parseInt(jsonDataSet[i].count);
						dataRowArray.push([branchName,counter]);
					}
				}
			});
			data.addRows(dataRowArray);
			// Set chart options
			var options = {
										 'title':'Company wise placements',
										 'width':500,
										 'height':400,
										 'pieHole':0.4
									  };

			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		}
	</script>
	<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      height:400px;
      margin: auto;
  }
  </style>

</head>
<body style="background-color:#f5f5f5">
<div id="myCarousel" class="carousel slide" style="margin-bottom:0%;;" data-ride="carousel">

			<ol class="carousel-indicators">
    			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    			<li data-target="#myCarousel" data-slide-to="1"></li>
    			<li data-target="#myCarousel" data-slide-to="2"></li>
    			<li data-target="#myCarousel" data-slide-to="3"></li>
  			</ol>

			<div class="carousel-inner" role="listbox" style="height:400px;margin-top:0em;margin-bottom:0em;background-color:white;">


    			<div class="item active">
      				<img src="images/lp1.jpg" alt="">

    			</div>

    			<div class="item">
      				<img src="images/lp2.jpg" alt="">

    			</div>

    			<div class="item">
      				<img src="images/lp3.jpg" alt="">

    			</div>

    			<div class="item">
      				<img src="images/lp4.jpg" alt="">
    			</div>
			</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    				<img  class="pull-left" height="50px" width="30px" style="margin-top:90%;" src="images/left.png"/>
  				</a>

  				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    				<img class="pull-right" height="50px" width="30px" style="margin-top:90%;" src="images/right.png"/>
  				</a>
		</div>
		<div class="alert alert-success" style="margin-bottom:0em;">
			<marquee id="notifications" style="font-family: 'Open Sans', sans-serif;"> </marquee>
		</div>
	<div class="page">
		<div class="module">
			<div style="background-color:#7DC57C; margin-top:0em; height:5em; padding-top:0.1em; text-align:center;" class="theHeader">
				<h2 style="font-family:branchFont">About JNEC</h2>
			</div>
			<div class="dataForModule" style="background-color:white; padding-top:2em; padding-bottom:2em; padding-left:3em;padding-right:3em;">
				<p style="color:#3e3e3e ;line-height:2.22222;font-family: 'Open Sans', sans-serif; font-size:1.1em;">
					Jawaharlal Nehru Engineering College is a premier institute of engineering that has carved a niche for itself in the field of technical education in a very short span of time. The college has made its presence felt in the world of technical education.

Unique in its structure, methods and goals, the college is strongly rooted in the philosophy of training and research that enhances the relationship between knowledge and its application and seeks to promote the creation of an ideal society.
	<br/><br/>The college is affiliated to Dr. Babasaheb Ambedkar Marathwada University, which confers the degree of Bachelor of Engineering (B.E.), Master of Engineering (M.E.) in various disciplines and Bachelor of Architecture (B. Arch.). JNEC is the first college in Marathwada to have been accredited by NBA and Council of Architecture.
				</p>
			</div>
		</div>

		<div class="module">
			<div style="background-color:#7DC57C; margin-top:0.8em; height:5em; padding-top:0.1em; text-align:center;" class="theHeader">
				<h2 style="font-family:branchFont">Placement statistics</h2>
			</div>
			<div class="dataForModule"  style="background-color:white;" >
				<div id="chart_div2" class="col-md-5" style=" background-color:white;"></div>
				<div id="chart_div" class="col-md-5" style="margin-left:3em; background-color:white;"></div>
			</div>
		</div>

		<script  type="text/javascript" src="js/jquery-js.js"></script>
	</div>
</body>
</html>
