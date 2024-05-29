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
<h1>STAFF PROFILE</h1>

<?php


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
  $queryView = "select * from admindetail where admin_ID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
  
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>

<form action="editprofilesuccess.php" name="editprofilesuccess"  method="POST">

    <b>STAFF ID: <?php echo $row['admin_ID']; ?><br><br></b>
	<b>STAFF NAME : <input type="text" name="admin_username" value="<?php echo $row['admin_username']; ?>" size="10" maxlength="10" required><br><br></b>
	<b>CONTACT : <input type="text" name="admin_num" value="<?php echo $row['admin_num']; ?>" size="30" maxlength="100" required><br><br></b>
	<b>EMAIL : <input type="text" name="admin_email" value="<?php echo $row['admin_email']; ?>" size="20" maxlength="20" required><br><br></b>
    <b>PASSWORD : <input type="password" name="admin_pass" value="<?php echo $row['admin_pass']; ?>" size="25" maxlength="30" required><br><br></b>
	
	<br><br>

<br>
<input type="hidden" name="admin_ID" value="<?php echo $row['admin_ID'];?>">


<input type="submit" value="UPDATE PROFILE DETAILS	">
<br></br>
</form>
</div>
</center>
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
echo "<a href=adminlogin.php> Login </a>";
}
?>
