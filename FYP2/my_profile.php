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
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #F4F3EE;
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
  padding: 10px 12px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #A1C6EA;
  color: black;
}

.topnav a.active {
  background-color: #A1C6EA;
  color: black;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}



	</style>
	<script src="https://kit.fontawesome.com/a6a2559751.js" crossorigin="anonymous"></script>
</head>
<body>
<center>
<div class="topnav">
  <a class="fas fa-user fa-3x" href="admin_my_profile.php" ></a>
  <a href="ADMIN_HOME_PAGE.php">HOME</a> 
  <a class="active" href="admin_management.php">MANAGEMENT</a>
  <a href="ADMIN_ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  
  <input type="text" name="find" placeholder="Search event title/venue">	
   
</div>

<div class="about-section">
<a href="STUDENT_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<br></br>
</div>
<br></br>
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
	<b>Scorun Collected: <?php echo $row['Scorun']; ?><br><br></b>



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
<button  onclick="document.location='STUDENT_HOME_PAGE.php'"type="submit">HOME PAGE</button>
<br><br>
<button  onclick="document.location='profile_update.php'"type="submit">EDIT PROFILE</button>
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
