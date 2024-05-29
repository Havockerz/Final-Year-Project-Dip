<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<?php

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
	$queryView = "select * from admindetail WHERE admin_ID = '".$_SESSION["UID"]."' ";
	$resultQ = $conn->query($queryView);
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
.topnav {
  overflow: hidden;
  background-color: #F4F3EE;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 22px 10px;
  text-decoration: none;
  font-weight: bold;
  font-size: 18	px;
  
}

.topnav a:hover {
  background-color: #FF7800;
  color: black;
}

.topnav a.active {
  background-color: #FF7800;
  color: black;
}

.topnav input[type=text] {
  float: right;
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-right: 10px;
  border: none;
  font-size: 18px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 20;
    padding: 20px;
  }
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
button {
  background-color: #FFBC71;
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
  <div class="topnav">
<h1> MY PROFILE </h1>
<div class="topnav">
<?php
   if ($resultQ->num_rows > 0) {
	   while($row = $resultQ->fetch_assoc()) {
?>

    <b>Staff Name: <?php echo $row['admin_username']; ?><br><br></b>
    <b>Staff ID: <?php echo $row['admin_ID']; ?><br><br></b>
	<b>Password: <?php echo $row['admin_pass']; ?><br><br></b>	
	<b>Phone Number: <?php echo $row['admin_num']; ?><br><br></b>
    <b>Email: <?php echo $row['admin_email']; ?><br><br></b>
	
	</div>
	
<?php 
	   }
    } else {
		echo "<tr><td colspan='5'> NO data selected </td></tr>";
	}

?>
<?php
$conn->close();
?>


<br><br>
<button  onclick="document.location='adminhomepage.php'"type="submit">HOME PAGE</button>
<button  onclick="document.location='admineditprofile'"type="submit">EDIT PROFILE</button>
<br><br>
</center>
</body>



<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=adminlogin.php> Login </a>";
}
?>