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
  background-color: #25283D;
}

div {
  border: 0px solid black;
  background-color: #F4F3EE;
  width : 100%;
}
</style>
</head>
<body>

<center>
<div class="about-section">
<a href="COMMITTEE_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<h1> USER UPDATED </h1>


<?php
	$userid=$_POST["UserID"];
	$password=$_POST["Password"];
	$fullname=$_POST["FullName"];
	$username=$_POST["Username"];
	$email=$_POST["Email"];
	$phonenum=$_POST["PhoneNum"];
	$gender=$_POST["gender"];
	$host ="localhost";
	$user = "root";
	$pass = "";
	$db ="cluvent";
	$conn = new mysqli($host,$user, $pass, $db);
	
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

else 
{
	$queryUpdate = "UPDATE USER SET Password = '".$password."', FullName = '".$fullname."', Username = '".$username."', Email = '".$email."', PhoneNum = '".$phonenum."', Gender = '".$gender."'
	WHERE UserID = '".$userid."' ";
	
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
<button  onclick="document.location='committee_my_profile.php'"type="submit">My Profile</button>

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
echo "<a href=login.html> Login </a>";
}
?>