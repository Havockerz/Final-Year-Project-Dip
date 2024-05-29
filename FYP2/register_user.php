<!DOCTYPE html>
<html>
<style>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #25283D;
}

.notification {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 20px;
  text-align: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333333;
  margin-bottom: 10px;
}

p {
  color: #666666;
  line-height: 1.5;
}
div {
  border: 0px solid black;
  background-color: #F4F3EE;
  width : 100%;
}
</style>
</style>
<head>
</head>
<?php
$usertype= "student" ;
$scorun= "0" ;
$fullname = $_POST['fullname'];
$Username = $_POST['username'];
$userid = $_POST['userid'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phonenum = $_POST['phonenum'];
$gender = $_POST['gender'];
$host= "localhost" ;
$username= "root" ; 
$password = "";
$dbname = "cluvent";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error){ 
	die("Connection failed: " . $conn->connect_error);
}
else
{
	$queryCheck="select * from user where UserID = '".$userid."'";
	$resultCheck=$conn->query($queryCheck);
	if($resultCheck->num_rows == 1){
		echo"<p style='color:red;'> User ID already exist</p>";
		echo "<a  href='register_page.php'>Try Again </a>";
	}
	else	
	{
	$queryUpdate = "insert into user (FullName,Username,UserID,Email,Password,PhoneNum,Gender,UserType,Scorun) values('".$fullname."','".$Username."','".$userid."','".$email."','".$pass."','".$phonenum."','".$gender."','".$usertype."','".$scorun."')";
	if ($conn->query($queryUpdate)==TRUE){
		echo"<p style='color:blue;'> Successfully Register</p>";
		echo "<a href='register_page.php'>Register New </a><br></br>";
		echo "<a href='LOGIN_PAGE.php'>Login </a>";
	}else{
	echo"<p style='color:red;'>Query Problems!:".$conn->error ."</p>";
		}
	
	}
}
$conn->close();
?>


<div class="notification">
</div>
</body>
</html>
