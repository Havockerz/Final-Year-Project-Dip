<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</style>
<script src="https://kit.fontawesome.com/a6a2559751.js" crossorigin="anonymous"></script>
</head>
<body>
<center>
<div class="topnav">
  <a class="fas fa-user fa-3x" href="my_profile.php" ></a>
  <a class="active" href="STUDENT_HOME_PAGE.php">HOME</a>
  <a href="STUDENT_EVENT_PAGE.php">EVENT</a>
  <a href="ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  <form name="search_result" action="search_result.php" method="post">
  <input type="text" name="find" placeholder="Search event title/venue">	    
  
  

</div>

<div class="about-section">
<a href="STUDENT_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>

</div>
<br></br>
<button> <a href="EVENT_PAGE.php">Upcoming Event</a></button>
<button> <a href="EVENT_PAGE.php">Upcoming Event</a></button>
<button> <a href="EVENT_PAGE.php">Upcoming Event</a></button>
<div style="padding-left:16px">
</center>
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