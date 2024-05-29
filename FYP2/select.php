<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title>Cluvent System</title>
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
</head>
<body>  

<center>
<div class="about-section">
<a href="event_page.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<h1> EVENT LIST </h1>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "CLUVENT";

$conn = new mysqli($host, $user, $pass, $db);
if($stmt = $conn->query("SELECT * FROM EVENT")){

  echo "List of event : ".$stmt->num_rows."<br><br>";
?>
<br></br>
</div>

<p style="color:white;">PLEASE CHOOSE ANY EVENT YOU WANT TO JOIN</p>
<form action="register_event.php" name="register_event" method="POST">

<table class="table">

  <colgroup>
    <col span="5" style="background-color: #F4F3EE">
    <col span="5" style="background-color: #F4F3EE">
  </colgroup>
<thead>
		<tr>
			<th></th>
			<th>Event ID</th>
			<th>Event Title</th>
			<th>Date</th>
			<th>Time</th>
			<th>Venue</th>
		</tr>
	</thead>
<?php 
  if ($stmt->num_rows> 0)
  {
    while ($row = $stmt->fetch_assoc())
{

?>

<tr>
<td><input type="radio" name="EventID" value="<?php echo $row['EventID'];?>"></td>
<td><?php echo $row['EventID'];?></td>
<td><?php echo $row['EventTitle'];?></td>
<td><?php echo $row['EventDate'];?> </td>
<td><?php echo $row['EventTime'];?> </td>
<td><?php echo $row['EventVenue'];?> </td>
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
echo $conn->error;

?>



<?php
$conn->close();
?>
<br>

<input class="button" type="Submit" value="Register">
<br></br>
</center>

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
</div>
</html>