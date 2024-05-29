<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<head>
<title>System</title>
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
  <a class="fas fa-user fa-3x" href="committee_my_profile.php" ></a>
  <a href="COMMITTEE_HOME_PAGE.php">HOME</a> 
  <a class="active" href="COMMITTEE_MANAGE_EVENT_PAGE.php">MANAGE EVENT</a>
  <a href="ADMIN_ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  <input type="text" name="find" placeholder="Search event title/venue">	
   
</div>
<div class="about-section">
<a href="COMMITTEE_MANAGE_EVENT_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>


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
  $queryView = "select * from EVENT WHERE UserID = '".$_SESSION["UID"]."'";
  $resultQ = $conn->query($queryView);
  
?>
</div>
<br></br>
<form action="edit_detail.php" name="edit_detail" method="POST">

<table class="table">

  <colgroup>
    <col span="5" style="background-color: #F4F3EE">
    <col span="5" style="background-color: #F4F3EE">
  </colgroup>
<thead>
		<tr>
			<th> Choose </th>
  <th> Event ID </th>
  <th> Title </th>
  <th> Date </th>
  <th> Time </th>
  <th> Venue </th>
  <th> User ID </th>
</tr>
	</thead>
<?php 
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>
<tr>
	<td><input type="radio" name="EventID" value="<?php echo $row['EventID'];?>" required></td>
	<td><?php echo $row['EventID']; ?></td>
	<td><?php echo $row['EventTitle']; ?></td>
	<td><?php echo $row['EventDate']; ?></td>
	<td><?php echo $row['EventTime']; ?></td>
	<td><?php echo $row['EventVenue']; ?></td>
	<td><?php echo $row['UserID']; ?></td>
</tr>
<?php
}
  } else 
    {
    echo "<tr><td colspan ='7'> No data selected </td></tr>";
    }
}
?>
</table>

<?php
$conn->close();
?>

<br><br>

<input type="Submit" class="button" value="Edit chosen event">

<br><br>
</form>

<br><br>
</div>
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
</center>