<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> cluvent system </title>
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

<script>
function TDate() {
 var UserDate = document.getElementById("vDate").value;
 var ToDate = new Date();
 if (new Date(UserDate).getTime() <= ToDate.getTime()) {
 alert("The Date must be SMALLER or Equal to today date");
 return false;
 }
returntrue;
}
</script>
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
<a href="manage_event.php" > <img src = "cluventlogo.png"  width="170" height="170"> </a>
<form action="admineventdetail.php" method="post" onsubmit="return TDate()">
<h1> ADD EVENT </h1>

<br><br>

<b>Event Title*:  <textarea name="EventTitle" ></textarea><br><br></b>
<b>Date*:  <input type="date" name="EventDate" id="vDate"><br><br></b>
<b>Time*:  <input type="time" name="EventTime"><br><br></b>
<b>Venue*:  <textarea name="EventVenue" ></textarea><br><br></b>


<p style="color:red"><i>field with * is compulsory </i></p>

<input type="reset" value="Cancel">
<input type="submit" name="upload" value="Upload">
<br><br>
</center>
</form>
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