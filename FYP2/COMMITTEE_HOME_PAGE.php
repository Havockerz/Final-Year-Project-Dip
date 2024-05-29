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

figure {
  display: grid;
  border-radius: 1rem;
  overflow: hidden;
  cursor: pointer;
}
figure > * {
  grid-area: 1/1;
  transition: .4s;
}
figure figcaption {
  display: grid;
  align-items: end;
  font-family: sans-serif;
  font-size: 2.3rem;
  font-weight: bold;
  color: #0000;
  padding: .75rem;
  background: var(--c,#0009);
  clip-path: inset(0 var(--_i,100%) 0 0);
  -webkit-mask:
    linear-gradient(#000 0 0),
    linear-gradient(#000 0 0);
  -webkit-mask-composite: xor;
  -webkit-mask-clip: text, padding-box;
}
figure:hover figcaption{
  --_i: 0%;
}
figure:hover img {
  transform: scale(1.2);
}
@supports not (-webkit-mask-clip: text) {
  figure figcaption {
   -webkit-mask: none;
   color: #fff;
  }
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  min-height: 100vh;
  display: grid;
  grid-auto-flow: column;
  place-content: center;
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
   
</style>
<script src="https://kit.fontawesome.com/a6a2559751.js" crossorigin="anonymous"></script>
</head>

<body>
<center>
<div class="topnav">
  <a class="fas fa-user fa-3x" href="committee_my_profile.php" ></a>
  <a class="active" href="COMMITTEE_HOME_PAGE.php">HOME</a>
  <a href="COMMITTEE_MANAGE_EVENT_PAGE">MANAGE EVENT</a>
  <a href="COMMITTEE_ABOUTUS_PAGE.php">ABOUT US</a>
  <a href="logout.php">LOG OUT</a>  
  <form name="search_result" action="search_result.php" method="post">
  <input type="text" name="find" placeholder="Search event title/venue">  
</div>
<div class="about-section">
<a href="COMMITTEE_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>
</div>
<figure>
    <img src="https://picsum.photos/id/287/250/300" alt="Mountains">
    <figcaption>View Event</figcaption>
</figure>
<figure style="--c:#fff5">
    <img src="https://picsum.photos/id/475/250/300" alt="Mountains">
    <figcaption>Add Event</figcaption>
</figure>
<figure style="--c:#fff5">
    <img src="https://picsum.photos/id/475/250/300" alt="Mountains">
    <figcaption>Delete Event</figcaption>
</figure>
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