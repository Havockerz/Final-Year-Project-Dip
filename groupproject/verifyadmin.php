<!DOCTYPE html>
<html>
	<head>
		<title> Verify Log In </title>
	</head>
	<style>
body {
			background-color: #000000;
			color: #F4F3EE;
			font-family: Arial, sans-serif;
		}
		p {
			color: #F4F3EE;
			font-size: 18px;
			margin: 20px 0;
			text-align: center;
		}
		button {
			background-color: #F4F3EE;
			border: none;
			border-radius: 5px;
			color:#25283D;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
			padding: 10px 20px;
			transition: background-color 0.3s ease;
		}
		button:hover {
			background-color: #FF5D00;
		}
</style>
<center>
<?php
//these codes is for login process
//check userid & pwd is matched
//get form input
$admin_ID = $_POST['admin_ID'];
$admin_pass= $_POST['admin_pass'];
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "event_management";
// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
 //to check if DB connection IS NOT OK
 die("Connection failed: " . $conn->connect_error);
}
else
{
//connection OK - get records for the selected User account
$queryCheck = "select * from admindetail where admin_ID = '".$admin_ID."'";
$resultCheck = $conn->query($queryCheck);
if ($resultCheck->num_rows == 0) { //if no record match
echo "<p style='color:red;'>User ID does not exists</p>";
echo "<br>Click <a href='adminlogin.php'> here </a> to LOGIN again.";
}
else{
while($row = $resultCheck->fetch_assoc()) {
if( $row["admin_pass"] == $admin_pass ) {
session_start();

$_SESSION["UID"] = $admin_ID ;

if ($_SESSION["UID"] == "$admin_ID") {
header("Location:adminhomepage.php");}
}
else {
echo "<p style='color:red;'>Incorrect user ID or PASSWORD!!!</p>";
echo "<br>Click <a href='adminlogin.php'> here </a> to LOGIN again.";
}

}
}
$conn->close();
}
?>
	</center>