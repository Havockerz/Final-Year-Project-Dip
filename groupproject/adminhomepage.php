	<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin Home Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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



.topnav {
  overflow: hidden;
  background-color: #F4F3EE;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 22px 10px;
  text-decoration: none;
  font-weight: bold;
  font-size: 18	px;
  
}

.topnav a:hover {
  background-color: #FF7800;
  color: black;
}

.topnav a.active {
  background-color: #FF7800;
  color: black;
}

.topnav input[type=text] {
  float: right;
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  margin-right: 10px;
  border: none;
  font-size: 18px;
}

@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 20;
    padding: 20px;
  }
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

	</head>
	<body>
		<center>
  <div class="topnav">
  <a href="adminprofile.php">PROFILE</a>
  <a class="active" href="adminhomepage.php">HOME</a>
  <a href="	eventlist.php">SUB EVENT</a>
  <a href="eventavailable.php">STUDENT</a>
  <a href="adminlogout.php">LOG OUT</a>  
  <form name="searchresult" action="searchresult.php" method="post">
  <input type="text" name="find" placeholder="Search event title">
  </div>
  <br></br>
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
</div>
</center>
</html>