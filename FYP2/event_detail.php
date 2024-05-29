<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<?php
	$EventTitle = $_POST["EventTitle"];
	$EventDate = $_POST["EventDate"];
	$EventTime = $_POST["EventTime"];
	$EventVenue = $_POST["EventVenue"];

?>

<head>
<title>Event Added</title>
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

<h1>EVENT DISPLAY</h1>

<br>
<b>Event Title: </b><?php echo $EventTitle;?> <br><br>
<b>Date: </b><?php echo $EventDate;?><br><br>
<b>Time: </b><?php echo $EventTime;?><br><br>
<b>Venue: </b><?php echo $EventVenue;?><br><br>


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
	$queryInsert = "insert into EVENT (EventTitle, EventDate, EventTime, EventVenue, UserID)
	values
	('".$EventTitle."', '".$EventDate."', '".$EventTime."', '".$EventVenue."', '".$_SESSION["UID"]."')";
	
	if ($conn->query($queryInsert) === TRUE) {
		echo "<p style='color:blue;'>Success insert event</p>";
	} else {
		echo "<p style='color:red;'>Error: Invalid query " . $conn->error. "</p>";
	}
	
}
$conn->close();
?>
<button onclick="document.location='eventviewpage.php'" style="margin-bottom:100px;" type="submit">VIEW EVENT</button>
<button onclick="document.location='addevent.php'" style="margin-bottom:100px;" type="submit">ADD EVENT</button>
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
</center>

