<!DOCTYPE html>
<html>

<head>
</head>
<?php
$student_username = $_POST['student_username'];
$student_ID = $_POST['student_ID'];
$student_pass = $_POST['student_pass'];
$student_num = $_POST['student_num'];
$student_email = $_POST['student_email'];
$host= "localhost" ;
$username= "root" ; 	
$password = "";
$dbname = "event_management";
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error){ 
	die("Connection failed: " . $conn->connect_error);
}
else
{
	$queryCheck="select * from studentdetail where student_username = '".$student_username."'";
	$resultCheck=$conn->query($queryCheck);
	if($resultCheck->num_rows == 1){
		echo"<p style='color:red;'> User ID already exist!!!</p>";
		echo "<a  href='registeruser.php'>Try Again </a>";
	}
	else	
	{
	$queryUpdate = "insert into studentdetail (student_username,student_ID,student_pass,student_num,student_email) values('".$student_username."','".$student_ID."','".$student_pass."','".$student_num."','".$student_email."')";
	if ($conn->query($queryUpdate)==TRUE){
		echo"<p style='color:blue;'> Congrats!!! You one of our member now!!!</p>";
		echo "<a href='memberlogin.php'>Login</a>";
	}else{
	echo"<p style='color:red;'>Query Problems!:".$conn->error ."</p>";
		}
	
	}
}
$conn->close();
?>


</body>
</html>
