<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Page</title>
	<link rel="stylesheet" type="text/css" href="css\del.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="logo.png">
</head>
<body>
	<div class="div1">
		<h2><span>This is a Basic Page for Deleting the Data of Passout Students</span></h2>
		<br>
		<div>
			<form method="POST" action="del_user.php">
				<label for="fname">Enter PG/UG:</label><br><br>
				<input type="text" id="fname" name="fname" placeholder="PG/UG"><br><br>
				<label for="dept">Admission Year:</label><br><br>
				<input type="text" id="year" name="year" placeholder="Enter Last Two digits of year"><br><br>
				<label for="dept">Department:</label><br><br>
				<select name="dept">
					<option name="dept" value="0">Select Department</option>  
					<option name="dept" value="Electronics">Electronics</option>  
					<option name="dept" value="Biotechnology">Biotechnology</option>  
					<option name="dept" value="BCAA">BCA A</option>  
					<option name="dept" value="BCAB">BCA B</option>  
					<option name="dept" value="BcomFT">Bcom FT</option> 
					<option name="dept" value="BcomCA">Bcom Corp A</option>
					<option name="dept" value="BcomCB">Bcom Corp B</option>   
					<option name="dept" value="BA">BA</option>
					<option name="dept" value="BBAA">BBA A</option>
					<option name="dept" value="BBAB">BBA B</option>
					<option name="dept" value="CS">Computer Sc</option>
					<option name="dept" value="MHRM">MHRM</option>
					<option name="dept" value="Mcom">Mcom</option>
					<option name="dept" value="MSW">MSW</option>
					<option name="dept" value="MA">MA</option>
				</select> 
				<input type="Submit" name="Submit" value="Submit"/>
			</form>
			<br>
			<div style="
			background: rgba(255, 0, 0, 1.0);
			text-align: center;
			width: 200px;
			margin: auto;
			border-radius: 10px;
			">
			<a href="index.php" style="color: #fff; text-decoration: none;">Go to main window</a>
		</div>

	</div>
</body>
</html>