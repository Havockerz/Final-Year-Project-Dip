<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> System </title>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #000000;
}
div {
  border: 0px solid black;
  background-color: #F4F3EE;
  width : 100%;
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
			font-weight: bold;	
}
button:hover {
  opacity: 1;
  background-color: #FF7800;
}
</style>
</head>

<body>

<center>
<br></br>

<?php
	$event_ID = $_POST["event_ID"];
	$event_name = $_POST["event_name"];
	$contact_number = $_POST["contact_number"];
	$location = $_POST["location"];
	$admin_ID = $_POST["admin_ID"];
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "event_management";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
else 
{
 $queryUpdate = "UPDATE subevent SET event_name = '".$event_name."', contact_number = '".$contact_number."', location = '".$location."', admin_ID = '".$admin_ID."'
 WHERE event_ID = '".$event_ID."' ";
	
 $resultUpdate = mysqli_query($conn, $queryUpdate); 
 
 if(!$resultUpdate) {
			
			die ("Query problems : ".mysqli_error($conn));
		}
		else {
			echo "<p style='color:blue;'>Event has been edited into database.</p>";
			
			
	}
}
?>	

<button onclick="document.location='eventlist.php'" type="button">VIEW ALL EVENT</button>

</div>
</body>
</html>

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login.php> Login </a>";
}
?>
</center>