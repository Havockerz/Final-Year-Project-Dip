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
** {box-sizing: border-box;}

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
<a href="SelectStudent.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
<br></br>
</div>
<br></br>
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
  $queryView = "select * from USER where userid = '".$_POST["UserID"]."'";
  $resultQ = $conn->query($queryView);
  
  if ($resultQ->num_rows> 0)
  {
    while ($row = $resultQ->fetch_assoc())
{

?>

<form action="edit_student_success.php" name="edit_student_success"  method="POST">

    <b>User ID: <input type="text" name="UserID" value="<?php echo $row['UserID']; ?>" size="10" maxlength="10" required><br><br></b>
	<b>Full Name : <input type="text" name="FullName" value="<?php echo $row['FullName']; ?>" size="30" maxlength="100" required><br><br></b>
	<b>Password : <input type="password" name="Password" value="<?php echo $row['Password']; ?>" size="10" maxlength="10" required><br><br></b>
    <b>Username : <input type="text" name="Username" value="<?php echo $row['Username']; ?>" size="25" maxlength="30" required><br><br></b>
	<b>Email: <input type="text" name="Email" value="<?php echo $row['Email']; ?>" size="7" maxlength="10" required><br><br></b>
	<b>Contact Number: <input type="text" name="PhoneNum" value="<?php echo $row['PhoneNum']; ?>" size="7" maxlength="10" required><br><br></b>
	<b>Gender: <input type="text" name="Gender" value="<?php echo $row['Gender']; ?>" size="7" maxlength="10" required><br><br></b>
	<b>User Type: <input type="text" name="UserType" value="<?php echo $row['UserType']; ?>" size="7" maxlength="10" required><br><br></b>
	<b>Scorun: <input type="text" name="Scorun" value="<?php echo $row['Scorun']; ?>" size="7" maxlength="10" required><br><br></b>


<br>
<br>
<input type="submit" value="Update Profile Details">


</form>
</div>
</center>
<?php
}
  }
}
$conn->close();
?>

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


