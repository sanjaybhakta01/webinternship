<?php
include("auth.php");
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
date_default_timezone_set('Asia/Kolkata');
$error="";

if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard - Secured Page</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
<div class="form">
<img src="/portal/images/contilogo.png">
<center><h1><p>Skill Development Portal</p></h1></center>
<p>Welcome to the Portal, <?php echo $_SESSION['username']; ?>.</p><br>
<p><a href="view.php">Manage Team Members</a><p>
<p><a href="viewskill.php">Manage Skillsets</a><p>
	<p><a href="setref.php">Set Reference Level</a><p>
		<p><a href="individual.php">Individual Sheet</a><p>
		<p><a href="compare.php">Foundation Summary Sheet</a><p>	
	<br><br>
<a href="logout.php">Logout</a>
</div>
</body>
</html>