<!DOCTYPE html>
<html>
	<head>
		<title> REGISTER AS MEMBER </title>
	</head>
	<br/>
	<br/>
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
.registerbtn {
  background-color: #FF6800;
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
		<center>
			<form method="post" action="register_user.php">
				<center>
					<div class="container">
						<h1>Become Our Member</h1>
						<p>Please fill in all the form</p>
						<hr>
							<label for="student_username">
								<b>Username</b>
							</label>
							<input type="text" placeholder="Enter Username" name="student_username" id="student_username" required>
							<label for="student_ID">
								<b>Student ID</b>
							</label>
							<input type="text" placeholder="Enter User ID" name="student_ID" id="student_ID" required>
							<label for="student_pass">
								<b>Password</b>
							</label>
							<input type="password" placeholder="Enter Password" name="student_pass" id="student_pass" required>
							<label for="student_num">
								<b>Phone Number</b>
							</label>
							<input type="text" placeholder="Enter Phone Number" name="student_num" id="student_num" required>
							<label for="student_email">
								<b>Email</b>
							</label>
							<input type="text" placeholder="Enter Email" name="student_email" id="student_email" required>
						</hr>
						<button type="submit" class="registerbtn">Register</button>
						<div class="register">
							<a href="memberlogin.php">Already a member?</a>
						</div>
					</form>
				</center>
			</body>
		</html>
