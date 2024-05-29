<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> Register Event </title>
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
<?php
$EventID = $_POST["EventID"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "cluvent";


$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

else
{
  
  $queryView = "select * from user WHERE UserID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
?>

<center>
<form action="register_success.php" method="post">
<div class="about-section">
<a href="STUDENT_HOME_PAGE.php" ><img src = "cluventlogo.png"  width="170" height="170" > </a>
<h1> EVENT REGISTRATION FORM </h1>
<br><br>

<?php 
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>

<b>Event ID:  <?php echo $EventID;?><br><br></b>
<b>Full Name:  <?php echo $row['FullName'];?><br><br></b>
<b>User ID:  <?php echo $row['UserID'];?><br><br></b>
<b>Username:  <?php echo $row['Username'];?><br><br></b>
<b>Email:  <?php echo $row['Email'];?><br><br></b>
<b>Contact Number*: <?php echo $row['PhoneNum'];?><br><br></b>

<?php
}
  } else 
    {
    echo "<tr><td colspan ='7'> No data selected </td></tr>";
    }
}
?>

<?php

$queryInsert = "insert into REGISTEREVENT (UserID, EventID)
	values
	('".$_SESSION["UID"]."', '".$_POST["EventID"]."')";
	
	if ($conn->query($queryInsert) === TRUE) {
		echo "<br>";
		echo "<p style='color:blue;'>Registration Successful</p>";

	} else {
		echo "<p style='color:red;'>Error: Invalid query " . $conn->error. "</p>";
	}
?>


<?php

$conn->close();
?>

<p><a href="student_home_page.php">Back to Main Page</a></p>
<br><br>
</center>
</div>
</form>
</body>
</html>

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login_page.php> Login </a>";
}
?>
