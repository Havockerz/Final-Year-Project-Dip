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
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #25283D;
}
html {
  box-sizing:border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(244, 243, 238);
  margin: 10px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color:#F4F3EE;
  color: black;
}

.container {
  padding: 0 16px;
  color : white;
  
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: white;
}
</style>
</head>
<body>
<div class="about-section">
<a href="COMMITTEE_HOME_PAGE.php" > <img src = "cluventlogo.png"  width="170" height="170" > </a>

  <h1>About Us</h1>
  <p>"I decided to develop this kind of system just to ease all UNITEN's student for their event purpose" - Hariez</p>  
</div>
<center>
<h1  style="color:white;">Our Team</h1>
</center>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="profile.png"  width="320" height="320" style="width:100%">
      <div class="container">
        <h2>Hariez Daniel</h2>
        <p class="title">Developer</p>
        
        <p>hariez@gmail.com</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="profile.png" width="320" height="320"style="width:100%">
      <div class="container">
        <h2>Sir Rajesh</h2>
        <p class="title">Supervisor</p>        
        <p>rajesh@uniten.edu.my</p>
        
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="profile.png" width="320" height="320"style="width:100%">
      <div class="container">
        <h2>Madam Saliza</h2>
        <p class="title">Panel</p>        
        <p>noorsaliza@uniten.edu.my</p>
        
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="profile.png" width="320" height="320"style="width:100%">
      <div class="container">
        <h2>Madam Zakiah</h2>
        <p class="title">Panel</p>        
        <p>zakiah@uniten.edu.my</p>
        
      </div>
    </div>
  </div>
</div>
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