<head>
<style>
body {
			background-color: #25283D;
			color: #F4F3EE;
			font-family: Arial, sans-serif;
		}
		h1 {
			color: #F4F3EE;
			margin-top: 50px;
			text-align: center;
		}
		p {
			color: #F4F3EE;
			font-size: 18px;
			margin: 20px 0;
			text-align: center;
		}
		button {
			background-color: #F4F3EE;
			border: none;
			border-radius: 5px;
			color:#25283D;
			cursor: pointer;
			font-size: 16px;
			margin-top: 20px;
			padding: 10px 20px;
			transition: background-color 0.3s ease;
		}
		button:hover {
			background-color: #A1C6EA;
		}
</style>
</head>
<body>
<center>
<h1>Logout</h1>	
	<button onclick="document.location='LOGIN_PAGE.php'">Login Again</button>
	<br></br>
<center>
<div class="about-section">
<?php
session_start();
if (isset($_SESSION["UID"]))
{
session_unset();
session_destroy();
echo "<br><p style='color:red;'>You have successfully logged 
out.</p>";

}
else {
echo " No session exists or session is expired. Please log in 
again";
echo "<br><br><a href='landing_page.html'>HOMEPAGE</a>";

}
?>
</div>
</center>
</body>
