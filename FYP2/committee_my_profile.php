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
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "cluvent";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else 
{
	$queryView = "select * from USER WHERE UserID = '".$_SESSION["UID"]."' ";
	$resultQ = $conn->query($queryView);
}

?>

<body>

<center>
<div class="about-section">
<a href="COMMITTEE_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<h1> MY PROFILE </h1>
<br></br>

<?php
   if ($resultQ->num_rows > 0) {
	   while($row = $resultQ->fetch_assoc()) {
?>

    <b>User ID: <?php echo $row['UserID']; ?><br><br></b>
    <b>Password: <?php echo $row['Password']; ?><br><br></b>
	<b>Username: <?php echo $row['Username']; ?><br><br></b>	
	<b>Full Name: <?php echo $row['FullName']; ?><br><br></b>
    <b>Email: <?php echo $row['Email']; ?><br><br></b>
	<b>Contact Number: <?php echo $row['PhoneNum']; ?><br><br></b>
	<b>Gender: <?php echo $row['Gender']; ?><br><br></b>
	<b>Usertype: <?php echo $row['UserType']; ?><br></br></b>


<?php 
	   }
    } else {
		echo "<tr><td colspan='7'> NO data selected </td></tr>";
	}

?>
</table>
<?php
$conn->close();
?>

<br><br>
<button  onclick="document.location='COMMITTEE_HOME_PAGE.php'"type="submit">HOME PAGE</button>
<br><br>
<button  onclick="document.location='committee_profile_update.php'"type="submit">EDIT PROFILE</button>
<br><br>
</div>
</center>
</body>

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login_page.php> Login </a>";
}
?>