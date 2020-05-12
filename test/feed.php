<?php
//$conn=mysql_connect("localhost","root","","") or die("Could not connect");
//include"db.php";
//session_start();
//$t_name=($_POST['t_name']);
//$t_sub=($_POST['t_sub']);
//if()
//INSERT INTO `feedbck` (`t_name`, `t_sub`) VALUES ('ABC', 'DM'), ('pragi', 'toc');
//?>

<!DOCTYPE html>
<html>
<head >
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

</head>

<body>
	
	<div class="container">
		<div class="col-md-12">

			<div align="center">
		
				<h1><b>Quality Assessment Program</b></h1>
				<h3>for</h3>
				<h2>Engineering/Managment/Pharmacy Institutes</h2>
				<h3>of</h3>
				<h1><b>STES/SPSPM/SSPM/YCSPM</b></h1>
	
			</div>
		</div>
		<hr size=30 color="black">
		<div class="row">
			<div class="col-md-6">
				<h4><b>College : </b><u>SKNCOE, PUNE</u></h4>	
				<h4><b>Year : </b><u><?php ?></u></h4>
				<h4><b>Branch : </b><u><?php ?></u></h4>
				<h4><b>Div : </b><u><?php ?></u></h4>
				<h4><b>Roll Count : </b><u><?php ?></u></h4>
				</div>
				<div class="col-md-6">
				<h4><b>Feedback for : </b><u><?php /*echo "t_name";*/ ?></u></h4>	
				<h4><b>Sub : </b><u><?php /*echo "t_sub";*/ ?></u></h4>	
				<h4><b>Total feedbacks : </b><u><?php /*echo "total";*/ ?></u></h4>	
				<h4><b>Date: </b><u><?php /*echo "t_date";*/ ?></u></h4>		
			</div>
		</div>	
			<hr size=30 color="black">
		<div class="row">
			<div class="col-md-6">
				<h4><b>No Problem : 14%</b><u><?php ?></u></h4>	
				<h4><b>Low Voice : 34%</b><u><?php ?></u></h4>
				<h4><b>Improper Board writing : </b><u><?php ?></u></h4>
				<h4><b>Improper Presenation : </b><u><?php ?></u></h4>
				<h4><b>Fast : </b><u><?php ?></u></h4>
				<h4><b>Poor English : </b><u><?php ?></u></h4>
				</div>
				<div class="col-md-6">
				<h4><b>Poor Preparation : </b><u><?php /*echo "t_name";*/ ?></u></h4>	
				<h4><b>Less Syllabus Covered : </b><u><?php /*echo "t_sub";*/ ?></u></h4>	
				<h4><b>Lack of Interaction : 64%</b><u><?php /*echo "total";*/ ?></u></h4>	
				<h4><b>Impunctual : </b><u><?php /*echo "t_date";*/ ?></u></h4>
				<h4><b>Less Explanation : </b><u><?php ?></u></h4>		
			</div>
		</div>
		<div align="center">
		<hr size=30 color="black">
		<h4><b>Total Score : </b><u><?php ?></u></h4>
		</div>
	</div>


</body>	
</html>