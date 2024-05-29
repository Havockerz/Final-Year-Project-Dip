<!DOCTYPE html> 
<html>

<head>
<title> REGISTER </title>
</head>

<style>	
* {box-sizing: border-box;}

.container { 
    width:40%;
	background-color: rgba(210,210,210,0.9);
	border: 4px solid black;
	border-radius: 50px;
} 

body 
{
  font-family: Arial, Helvetica, sans-serif;
  background-color: #25283D;
}

div

border
{
  border: 1px solid black;  
  background-color: #7180B9;
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 80px;
}

*{
	padding:90;
    margin: 90;
	box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
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
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 20px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #171738;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
	
}
.registerbtn:hover {
  opacity: 1;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align:center;
}

</style>

<body>


<form method="post" action="register_user.php">
<center>
  <div class="container">
  
  
  <div><img src = "cluventlogo.png"width="130" height="130"></div>
	
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	
	<label for="fullname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fullname" id="fullname" required>
	
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>
    
    <label for="userid"><b>User ID</b></label>
    <input type="text" placeholder="Enter User ID" name="userid" id="userid" required>
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    
    <label for="phonenum"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="phonenum" id="phonenum" required>
	
	<label for="gender"><b>Gender</b></label>
	<input type="radio" value="Male" name="gender"  > Male 	
	<input type="radio" value="Female" name="gender"> Female 
	<input type="radio" value="Other" name="gender"> Other
	
	
	</hr>    

    <button type="submit" class="registerbtn">Register</button>
	
	 <div class="register"><a href="LOGIN_PAGE.php">Already have an account?</a>
  </div>
  
</form>	
</body>
</html>