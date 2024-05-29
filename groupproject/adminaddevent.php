<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> Admin Add Event </title>
<style>
* {box-sizing: border-box;}

.container { 
    width:40%;
	background-color: rgba(210,210,210,0.9);
	border: 4px solid orange;
	border-radius: 50px;
} 

body 
{
  font-family: Arial, Helvetica, sans-serif;
  background-color: #000000;
}

div

border
{
  border: 1px solid black;  
  background-color: #7180B9;
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 80px;
}

*{
	padding:90;
    margin: 90;
	box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}	

</style>
</head>
<body>	
<center>
<br></br>
<div class="container">
<form action="eventadded.php" method="post" onsubmit="return TDate()">	

<h1> ADD SUB EVENT </h1>
<b>Title:  <input name="event_name" ></input><br><br></b>
<b>Contact:  <input name="contact_number"><br><br></b>
<b>Venue:  <input name="location" ></input><br><br></b>
<input type="reset" value="Cancel">
<input type="submit" name="upload" value="Upload">

<br><br>
<a href='eventlist.php'>Return</a>
</div>
</center>
</form>
</body>
</html>

<?php 
}
else
{
echo "No session exists or session has expired. Please log in again.<br>";
echo "<a href=login.php> Login </a>";
}
?>