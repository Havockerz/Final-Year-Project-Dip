<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Event Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #000000;
}
.table {
    width: 90%;
    border: none;
    margin-bottom: 20px;
}
    .table thead th {
        font-weight: bold;
        text-align: center;
        border: none;
        padding: 10px 15px;
        background: #FF7800;
        font-size: 18px;
    }

    .table thead tr th:first-child {
        border-radius: 0px;
    }

    .table thead tr th:last-child {
        border-radius: 0px;
    }

.table tbody td {
        text-align: center;
        border: none;
        padding: 10px 15px;
        font-size: 18px;
        vertical-align: top;
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
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
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

	<div class="topnav">
  <a href="adminprofile.php">PROFILE</a>
  <a href="adminhomepage.php">HOME</a>
  <a class="active"href="eventlist.php">SUB EVENT</a>
  <a href="eventavailable.php">STUDENT</a>
  <a href="adminlogout.php">LOG OUT</a>  
  <form name="searchresult" action="searhresult.php" method="post">
  <input type="text" name="find" placeholder="Search event title">	
   
</div>
<br></br>
<h1 style="color:white"> EVENT HAS BEEN DELETED </h1>
<br></br>
</div>


<?php
$event_ID = $_POST["event_ID"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "event_management";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}

else 
{
	$queryDelete = "DELETE FROM subevent WHERE event_ID = '".$event_ID."' ";
	
	if ($conn->query($queryDelete) === TRUE) {
		echo "<p style='color:blue;'>Record deleted successfully</p>";
		echo "<br><br>";
		echo "<a style ='color:white;' href='eventlist.php'> View all events </a> ";
	} else {
		echo "<p style='color:red;'>Error: Deleting query " .$conn->error. "</p>";
	}
}
$conn->close();

?>
</div>
</body></html>

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