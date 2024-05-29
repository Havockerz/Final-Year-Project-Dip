<!DOCTYPE html>
<html>
<head>

<title> Verify Log In </title>
</head>

<center>
<?php
//these codes is for login process
//check userid & pwd is matched
//get form input
$userid = $_POST['userid'];
$password= $_POST['password'];

//declare DB connection variables
$host = "localhost"; //host name
$user = "root"; //database userid
$pass = ""; //database pwd
$db = "cluvent";// please write your DB name
// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
 //to check if DB connection IS NOT OK
 die("Connection failed: " . $conn->connect_error);
}
else
{
//connection OK - get records for the selected User account
$queryCheck = "select * from user where UserID = '".$userid."'";
$resultCheck = $conn->query($queryCheck);
if ($resultCheck->num_rows == 0) { //if no record match
echo "<p style='color:red;'>User ID does not exists</p>";
echo "<br>Click <a href='LOGIN_PAGE.php'> here </a> to LOGIN again.";
}
else{
// record matched, get the data
while($row = $resultCheck->fetch_assoc()) {
if( $row["Password"] == $password ) {
//in order to asign, use or destroy session
//calling the session_start() is compulsory
session_start();
//asign userid value to session userid
$_SESSION["UID"] = $userid ;
$_SESSION["UserType"] = $row["UserType"];

//redirect to page menu.php
if ($_SESSION["UserType"] == "committee") {
  header("Location:COMMITTEE_HOME_PAGE.php");
}if ($_SESSION["UserType"] == "admin") {
	header("Location:ADMIN_HOME_PAGE.php");
}if ($_SESSION["UserType"] == "student") {
	header("Location:STUDENT_HOME_PAGE.php");
}
}
else
{
echo "<p style='color:red;'>Incorrect userid or password!</p>";
echo "<br>Click <a href='LOGIN_PAGE.php'> here </a> to LOGIN again.";
}
}
}
$conn->close();
}
?>
</center>