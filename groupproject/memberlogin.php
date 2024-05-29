<!DOCTYPE html>
<html>
	<head>
		<title>MEMBER LOGIN PAGE</title>
	</head>
	<br></br>
	<br></br>
	<style>	
* {box-sizing: border-box;}

.container { 
    width:40%;
	background-color: rgba(210,210,210,0.9);
	border: 4px solid orange;
	border-radius: 50px;
} 

body 
{
  font-family: Arial, Helvetica, sans-serif;
  background-color: #000000;
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
.loginbtn {
  background-color: #FF6800;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
	
}
.loginbtn:hover {
  opacity: 1;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align:center;
}

</style>
	<body>
		<center>
			<div class="container">
				<form action="verifymember.php" method="post">
					<label for="student_ID">
						<b>Member ID</b>
					</label>
					<input type="text" name="student_ID" size="20" maxlength="20" required>
					<label for="student_pass">
						<b>Password</b>
					</label>
					<input type="password" name="student_pass" size="20" maxlength="20" required>
					<button type="submit" class="loginbtn">LOG IN</button>
					<div>
						<a href="registeruser.php">
							<br/>NOT A MEMBER?<br/>
						</a>
						<a href="landing.html">
						<br/>RETURN<br/>
					</a>
					</div>
					
				</form>
			</center>
		</body>
	</html>