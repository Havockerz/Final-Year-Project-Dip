<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> cluvent system </title>
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
<script>
function TDate() {
 var UserDate = document.getElementById("vDate").value;
 var ToDate = new Date();
 if (new Date(UserDate).getTime() <= ToDate.getTime()) {
 alert("The Date must be SMALLER or Equal to today date");
 return false;
 }
 return true;
}
</script>
</head>
<body>	
<center>

<div class="about-section">

<?php
  if ($_SESSION["UserType"] == "committee") {
?>
	<a href="COMMITTEE_EDIT_EVENT_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170"> </a>
<?php
  }else if ($_SESSION["UserType"] == "admin") {
?>
	<a href="manage_event.php" > <img src = "cluventlogo.png"  width="170" height="170"> </a>
<?php
}else {
	?>
	
<?php
}
?>
<form action="event_detail.php" method="post" onsubmit="return TDate()">
<h1> ADD EVENT </h1>

<br><br>

<b>Event Title*:  <textarea name="EventTitle" ></textarea><br><br></b>
<b>Date*:  <input type="date" name="EventDate" id="vDate"><br><br></b>
<b>Time*:  <input type="time" name="EventTime"><br><br></b>
<b>Venue*:  <textarea name="EventVenue" ></textarea><br><br></b>


<p style="color:red"><i>field with * is compulsory </i></p>

<input type="reset" value="Cancel">
<input type="submit" name="upload" value="Upload">
<br><br>
</center>
</form>
</body>
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
