<!DOCTYPE html>
<html>

<head>
	<title>Delete Page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "qrsystem");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all values from the form data(input)
		$fname = $_REQUEST['fname'];
		$year = $_REQUEST['year'];
		$dept = $_REQUEST['dept'];		
		// Performing insert query execution
		// here our table name is college
		$sql = "DELETE FROM `users` WHERE email Like '$fname$year$dept'"; 
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>The data of selected users has been deleted.<br>"
			. " Kindly Verify in DataBase.<br>"
			. " Thank You</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
		<a href="index.php">Go to main window</a>
	</center>
</body>

</html>
