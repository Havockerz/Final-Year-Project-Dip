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
  width : 70%;
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
<div class="about-section">
<h1> DETAIL UPDATED </h1>


<?php
	$admin_ID=$_POST["admin_ID"];
	$admin_pass=$_POST["admin_pass"];
	$admin_username=$_POST["admin_username"];
	$admin_num=$_POST["admin_num"];
	$admin_email=$_POST["admin_email"];
	
	$host ="localhost";
	$user = "root";
	$pass = "";
	$db ="event_management";
	$conn = new mysqli($host,$user, $pass, $db);
	
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

else 
{
	$queryUpdate = "UPDATE admindetail SET admin_pass = '".$admin_pass."', admin_username = '".$admin_username."', admin_num = '".$admin_num."', admin_email = '".$admin_email."'
	WHERE admin_ID = '".$admin_ID."' ";
	
	$resultUpdate = mysqli_query($conn, $queryUpdate);
	
	if(!$resultUpdate){
		die("Query problems : ".mysqli_error($conn));
	}
	else{
		echo "Record has been updated into database.";
		echo "<br><br>";
		
	}
}

?>
<button  onclick="document.location='adminprofile.php'"type="submit">My Profile</button>

<br></br>
</div>
</center>
<body>
</html>	

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=adminlogin.php> Login </a>";
}
?>