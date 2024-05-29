<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {font-family: Arial, Helvetica, sans-serif;}
body {background-color: #25283D;}

.header {
  border: 0px solid black;
  background-color: #F4F3EE;
  width : 100%;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  text-align: center;
  width: 100%;
  padding: 15px;
  margin: 5px 0 5px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #25283D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}



/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 10px;
}



/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: white;
  margin: 5% auto 15% auto; 
  border: 1px solid black;
  width: 50%; 
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

.spanpsw {
  float: left;
  padding-top: 16px;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.8s;
  animation: animatezoom 0.8s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  
}

</style>
</head>
<body>

<center>

<div class="header"><img src = "cluventlogo.png"width="190" height="190"></div>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="loginVerify.php" method="post">
    
	<div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="cluventlogo.png" >
    </div>

    <div class="container">
      <label for="userid"><b>User ID</b></label>
      <input type="text" name="userid" size="20" maxlength="20" required>

      <label for="password"><b>Password</b></label>
      <input type="password" name="password" size="20" maxlength="20" required>
        
      <button type="submit">Login</button>
	  
	  <div class="register"><a href="REGISTER_PAGE.php"><br></br>Create an account?<br></br></a>      
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

</script>
</center>
</body>
</html>