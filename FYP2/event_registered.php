<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

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
  $queryView = "SELECT REGISTEREVENT.RegisterID, REGISTEREVENT.UserID, EVENT.EventTitle, EVENT.EventDate, EVENT.EventTime, EVENT.EventVenue
  FROM REGISTEREVENT INNER JOIN EVENT ON EVENT.EventID=REGISTEREVENT.EventID
  WHERE REGISTEREVENT.UserID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
  
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
  background-color: #25283D;
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
        background: #A1C6EA;
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
	<a class="fas fa-user fa-3x" href="my_profile.php" ></a>
	<a href="STUDENT_HOME_PAGE.php">HOME</a>  
	<a class="active" href="STUDENT_EVENT_PAGE.php">EVENT</a>
	<a href="ABOUTUS_PAGE.php">ABOUT US</a>
	<a href="logout.php">LOG OUT</a>  
	<form name="search_result" action="search_result.php" method="post">
  <input type="text" name="find" placeholder="Search event title/venue">    
	
</div>	

<div class="about-section">
<a href="STUDENT_EVENT_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>

</div>
<br></br>
<h1 style="color:white"> EVENT REGISTERED </h1>
<p style="color:white"> You have registered for these events </p>

<table class="table">
<colgroup>
    <col span="2" style="background-color: #F4F3EE">
    <col span="4" style="background-color: #F4F3EE">
  </colgroup>
  <thead>
<tr>
  <th> RegisterID </th>
  <th> User ID </th>
  <th> Event Title</th>
  <th> Date</th>
  <th> Time</th>
  <th> Venue</th>
</tr>
</thead>
<?php 
    while ($row = $resultQ->fetch_assoc())
{

?>
<tr>
	<td><?php echo $row['RegisterID']; ?></td>
	<td><?php echo $row['UserID']; ?></td>
	<td><?php echo $row['EventTitle']; ?></td>
	<td><?php echo $row['EventDate']; ?></td>
	<td><?php echo $row['EventTime']; ?></td>
	<td><?php echo $row['EventVenue']; ?></td>
</tr>
	<?php
  }
}
$conn->close();
?>
</table>
<br><br>
</form>


</div>
</center>

</body>
</html>	
<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login_page.php> Login </a>";
}
?>