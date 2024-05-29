<?php 
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<title> System </title>
</head>

<body>
<center>
<h1> SEARCH </h1>
<h2> Enter your search keyword: </h2>


<form name="search_result" action="search_result.php" method="post">

<br>
Event Title / Venue : <input type="text" name="find" size="20" required>
<br><br>

<input type="submit" value="Search">
<br><br>
<a href="committee_home_page"> Main Page </a>

</form>
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
</center>