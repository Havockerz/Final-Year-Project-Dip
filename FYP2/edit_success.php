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
.button {
      display: inline-block;
      padding: 12px 24px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      color: black;
      background-color:  #F4F3EE;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: background-color 0.3s;
    }

    .button::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.2);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .button:hover {
      background-color: #A1C6EA;
    }

    .button:hover::before {
      opacity: 1;
    }
</style>
</head>

<body>

<center>
<div class="about-section">
<a href="COMMITTEE_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
</div>
<br></br>

<?php
	$EventID = $_POST["EventID"];
	$EventTitle = $_POST["EventTitle"];
	$EventVenue = $_POST["EventVenue"];
	$EventDate = $_POST["EventDate"];
	$EventTime = $_POST["EventTime"];
	

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
 $queryUpdate = "UPDATE EVENT SET EventTitle = '".$EventTitle."', EventVenue = '".$EventVenue."', EventDate = '".$EventDate."', EventTime = '".$EventTime."'
 WHERE EventID = '".$EventID."' ";
	
 $resultUpdate = mysqli_query($conn, $queryUpdate); 
 
 if(!$resultUpdate) {
			
			die ("Query problems : ".mysqli_error($conn));
		}
		else {
			echo "<p style='color:blue;'>Event has been edited into database.</p>";
			
			
	}
}
?>	

<a href="eventviewpage.php" class="button">View All Event</a>

</div>

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
</center>