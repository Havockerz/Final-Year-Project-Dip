<head>
<style>
body {
			background-color: #000000;
			color: #F4F3EE;
			font-family: Arial, sans-serif;
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
			font-weight: bold;	
		}
		button:hover {
			background-color: #FF7800;
		}
</style>
</head>
<body>
<center>
	<button onclick="document.location='adminlogin.php'">Login Again</button>
	<br></br>
<center>
<div class="about-section">
<?php
session_start();
if (isset($_SESSION["UID"]))
{
session_unset();
session_destroy();
echo "<br><p style='color:red;'>You have successfully logged out.</p>";
echo "<br><br><a href='landing.html'>HOMEPAGE</a>";
}
else {
echo "<br><p style='color:red;'>You have successfully logged out.</p>";
echo "<br><br><a href='landing.html'>HOMEPAGE</a>";

}
?>
</div>
</center>
</body>
