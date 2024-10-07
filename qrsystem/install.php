<?php
	//Connect to database
$servername = "localhost";
$username = "root";		//put your phpmyadmin username.(default is "root")
$password = "";			//if your phpmyadmin has a password put it here.(default is "root")
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

	// Create database
$sql = "CREATE DATABASE qrsystem";
if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
} else {
	echo "Error creating database: " . $conn->error;
}

echo "<br>";

$dbname = "qrsystem";

$conn = new mysqli($servername, $username, $password, $dbname);


	// sql to create table
/*$sql = "SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users created successfully";
}
else 
{
	echo "Error creating table: " . $conn->error;
}
*/

$sql = "CREATE TABLE `admin` (
	`id` int(11) NOT NULL,
	`admin_name` varchar(30) NOT NULL,
	`admin_email` varchar(80) NOT NULL,
	`admin_pwd` longtext NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if ($conn->query($sql) === TRUE)
{
	echo "Table admin created successfully";
} 
else 
{
	echo "Error creating table: " . $conn->error;
}


$sql = "INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$89uX3LBy4mlU/DcBveQ1l.32nSianDP/E1MfUh.Z.6B4Z0ql3y7PK')";

if ($conn->query($sql) === TRUE)
{
	echo "Table admin updated successfully";
}
else
{
	echo "Error updating table: " . $conn->error;
}


$sql = "CREATE TABLE `devices` (
	`id` int(11) NOT NULL,
	`device_name` varchar(50) NOT NULL,
	`device_dep` varchar(20) NOT NULL,
	`device_uid` text NOT NULL,
	`device_date` date NOT NULL,
	`device_mode` tinyint(1) NOT NULL DEFAULT '0'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if ($conn->query($sql) === TRUE)
{
	echo "Table device created successfully";
}
else 
{
	echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE `users` (
	`id` int(11) NOT NULL,
	`username` varchar(30) NOT NULL DEFAULT 'None',
	`serialnumber` double NOT NULL DEFAULT '0',
	`gender` varchar(10) NOT NULL DEFAULT 'None',
	`email` varchar(50) NOT NULL DEFAULT 'None',
	`card_uid` varchar(30) NOT NULL,
	`card_select` tinyint(1) NOT NULL DEFAULT '0',
	`user_date` date NOT NULL,
	`device_uid` varchar(20) NOT NULL DEFAULT '0',
	`device_dep` varchar(20) NOT NULL DEFAULT '0',
	`add_card` tinyint(1) NOT NULL DEFAULT '0'
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users created successfully";
} 
else 
{
	echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE `users_logs` (
	`id` int(11) NOT NULL,
	`username` varchar(100) NOT NULL,
	`serialnumber` double NOT NULL,
	`card_uid` varchar(30) NOT NULL,
	`device_uid` varchar(20) NOT NULL,
	`device_dep` varchar(20) NOT NULL,
	`checkindate` date NOT NULL,
	`timein` time NOT NULL,
	`timeout` time NOT NULL,
	`card_out` tinyint(1) NOT NULL DEFAULT '0',
	`department` varchar(30) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users_logs created successfully";
} 
else 
{
	echo "Error creating table: " . $conn->error;
}


$sql = "ALTER TABLE `admin`
ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) 
{
	echo "Table Admin updated successfully";
}
else 
{
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `devices`
ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) 
{
	echo "Table devices updated successfully";
}
else 
{
	echo "Error updating table: " . $conn->error;
}




$sql = "ALTER TABLE `users`
ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users updated successfully";
}
else 
{
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `users_logs`
ADD PRIMARY KEY (`id`)";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users_logs updated successfully";
}
else {
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

if ($conn->query($sql) === TRUE) 
{
	echo "Table admin updated successfully";
}
else {
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `devices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

if ($conn->query($sql) === TRUE) 
{
	echo "Table devices updated successfully";
}
else {
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users updated successfully";
}
else {
	echo "Error updating table: " . $conn->error;
}


$sql = "ALTER TABLE `users_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT";

if ($conn->query($sql) === TRUE) 
{
	echo "Table users_logs updated successfully";
} 
else {
	echo "Error updating table: " . $conn->error;
}


$conn->close();

?>