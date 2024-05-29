<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php
	$event_name = $_POST["event_name"];
	$contact_number = $_POST["contact_number"];
	$location = $_POST["location"];
?>

<head>
<br></br>
<br></br>
<br></br>
<title>Event Added</title>
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
</style>
</head>

<body>
<center>
<div class="about-section">

<h1>Event Added</h1>

<b>Title: </b><?php echo $event_name;?> <br><br>
<b>Contact: </b><?php echo $contact_number;?><br><br>
<b>Venue: </b><?php echo $location;?><br><br>

<div>
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
	$queryInsert = "insert into subevent (event_name, contact_number, location, admin_ID)
	values
	('".$event_name."', '".$contact_number."', '".$location."', '".$_SESSION["UID"]."')";
	
	if ($conn->query($queryInsert) === TRUE) {
		echo "<p style='color:blue;'>Successfully insert the sub event</p>";
		echo "<br><br><a href='adminhomepage.php'>HOMEPAGE</a><br></br>";
	} else {
		echo "<p style='color:red;'>Error: Invalid query " . $conn->error. "</p>";
		
	}
	
}
$conn->close();
?>

</div>
</center>
</body>
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

