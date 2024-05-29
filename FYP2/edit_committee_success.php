<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
table {
	color:white;
}
.topnav {
  overflow: hidden;
  background-color: #F4F3EE;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #A1C6EA;
  color: black;
}

.topnav a.active {
  background-color: #A1C6EA;
  color: black;
}

.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
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
	<script src="https://kit.fontawesome.com/a6a2559751.js" crossorigin="anonymous"></script>
</head>
<body>
<center>
<div class="topnav">
  <a class="fas fa-user fa-3x" href="admin_my_profile.php" ></a>
  <a href="ADMIN_HOME_PAGE.php">HOME</a> 
  <a class="active" href="admin_management.php">MANAGEMENT</a>
  <a href="ADMIN_ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  
  <input type="text" name="find" placeholder="Search event title/venue">	
  </div>
  <center>
<div class="about-section">
<a href="admin_management.php" > <img src = "cluventlogo.png"  width="170" height="170" ></a>
</center>
<br></br>
<?php
	$UserID=$_POST["UserID"];
	$Password=$_POST["Password"];
	$FullName=$_POST["FullName"];
	$Email=$_POST["Email"];
	$Username=$_POST["Username"];
	$PhoneNum=$_POST["PhoneNum"];
	$Gender=$_POST["Gender"];
	$UserType=$_POST["UserType"];
	$host ="localhost";
	$user = "root";
	$pass = "";
	$db ="cluvent";
	
	$conn = new mysqli($host,$user, $pass, $db);
	
if($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}

else 
{
	$queryUpdate = "UPDATE USER SET UserID = '".$UserID."', FullName = '".$FullName."', Password = '".$Password."', Username = '".$Username."', Email = '".$Email."',
	PhoneNum = '".$PhoneNum."', Gender = '".$Gender."',UserType = '".$UserType."'
	WHERE UserID = '".$UserID."' ";
	
	$resultUpdate = mysqli_query($conn, $queryUpdate);
	
	if(!$resultUpdate){
		die("Query problems : ".mysqli_error($conn));
	}
	else{
		
		echo "RECORD HAVE BEEN UPDATE IN DATABASE";
		echo "<br><br>";
		
	}
}

?>
</div>

<br></br>
<a href="manage_committee.php" class="button">Manage Committee</a>	
</div>

</body>
</html>	

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