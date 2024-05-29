<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Detail</title>
<style>
*{box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}
div {
  border: 0px solid black;
  background-color: #F4F3EE;
  width : 100%;
}
  }
}

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


button {
  background-color: #F4F3EE;
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

<?php
$event_ID=$_POST["event_ID"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "event_management";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
else
{
  $queryView = "select * from subevent where event_ID ='".$event_ID."'";
  $resultQ = $conn->query($queryView);
  
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>
<div class="container">
<form action="editsuccess.php" name="editsuccess"  method="POST">
<b>TITLE: <input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" size="20" maxlength="25" required><br><br></b>
<b>CONTACT: <input type="text" name="contact_number" value="<?php echo $row['contact_number']; ?>" size="20" maxlength="20" required><br><br></b>
<b>VENUE: <input type="text" type="hidden" name="location" value="<?php echo $row['location']; ?>" size="20" maxlength="20" required><br><br></b>
<b>STAFF ID :  <input type="hidden" name="admin_ID"><?php echo $row['admin_ID']; ?></input></b><br></b>
<br></b>
<b>EVENT ID :  <input type="hidden" name="event_ID"><?php echo $row['event_ID']; ?></input></b><br></b>

<br><br>
<input type="submit" class="button" value="Edit Event Details">
</div>
</form>

<?php
}
  }
}
$conn->close();
?>

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
