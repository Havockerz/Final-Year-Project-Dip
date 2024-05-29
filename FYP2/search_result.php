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
  <a class="fas fa-user fa-3x" href="admin_my_profile.php" ></a>
  <a href="ADMIN_HOME_PAGE.php">HOME</a> 
  <a class="active" href="admin_management.php">MANAGEMENT</a>
  <a href="ADMIN_ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  
  <input type="text" name="find" placeholder="Search event title/venue">	
   
</div>

<div class="about-section">


<?php
  if ($_SESSION["UserType"] == "committee") {
?>
	<a href="COMMITTEE_HOME_PAGE.php"><img src = "cluventlogo.png"  width="170" height="170" ></a>
<?php
  }else if ($_SESSION["UserType"] == "admin") {
?>
	<a href="ADMIN_HOME_PAGE.php"><img src = "cluventlogo.png"  width="170" height="170" ></a>
<?php
}else {
	?>
	<a href="STUDENT_HOME_PAGE.php"><img src = "cluventlogo.png"  width="170" height="170" ></a>
<?php
}
?>
<br></br>
</div>
<br></br>
<h1 style="color:white"> SEARCH RESULT </h1>
<br></br>
</div>
<table style="width: 80%;">
  <colgroup>
    <col span="2" style="background-color: #F4F3EE">
    <col span="3" style="background-color: #F4F3EE">
  </colgroup>
<tr>
<th> Event ID </th>
<th> Title </th>
<th> Date </th>
<th> Start Time </th>
<th> Venue </th>
<br></br>
</tr>

<?php

$find = $_POST['find'];
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
  $queryGet = "select * from EVENT where EventTitle LIKE '%".$find."%' OR EventVenue LIKE '%".$find."%'";
  $resultGet = $conn->query($queryGet);
  
  
  
  if ($resultGet->num_rows> 0)
  {
    while ($row = $resultGet->fetch_assoc()) {
	?>

<tr>
<td><?php echo $row['EventID']; ?></td>
<td><?php echo $row['EventTitle']; ?></td>
<td><?php echo $row['EventDate']; ?></td>
<td><?php echo $row['EventTime']; ?></td>
<td><?php echo $row['EventVenue']; ?></td>
</tr>
	<?php
}
  }
  else 
  {
	  echo "Sorry, no record was found";
	  echo "<br><br>";		
	  echo "Click <a href='search_event.php'> here </a> to search again";


  }
}
$conn->close();
?>


<br><br>
</div>

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
</center>