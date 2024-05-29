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

<body>

<center>
<div class="about-section">
<a href="committee_my_profile.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<h1>SELECTED PROFILE DETAIL</h1>

<?php


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
  $queryView = "select * from USER where UserID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
  
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>

<form action="committee_profile_success.php" name="committee_profile_success"  method="POST">

    <b>User ID: <?php echo $row['UserID']; ?><br><br></b>
	<b>Password : <input type="password" name="Password" value="<?php echo $row['Password']; ?>" size="10" maxlength="10" required><br><br></b>
	<b>Full Name : <input type="text" name="FullName" value="<?php echo $row['FullName']; ?>" size="30" maxlength="100" required><br><br></b>
	<b>Username : <input type="text" name="Username" value="<?php echo $row['Username']; ?>" size="20" maxlength="20" required><br><br></b>
    <b>Email : <input type="text" name="Email" value="<?php echo $row['Email']; ?>" size="25" maxlength="30" required><br><br></b>
	<b>Contact Number : <input type="text" name="PhoneNum" value="<?php echo $row['PhoneNum']; ?>" size="25" maxlength="30" required><br><br></b>
	<label for="gender"><b>Gender</b></label>
	<input type="radio" value="Male" name="gender"  > Male 	
	<input type="radio" value="Female" name="gender"> Female 
	<input type="radio" value="Other" name="gender"> Other
	<br><br>
	<b>Scorun: <?php echo $row['Scorun'];?><br><br></b>


<br>
<br>
<input type="hidden" name="UserID" value="<?php echo $row['UserID'];?>">
<input type="hidden" name="Scorun" value="<?php echo $row['Scorun'];?>">


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
echo "<a href=login.html> Login </a>";
}
?>