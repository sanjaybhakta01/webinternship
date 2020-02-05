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
<title>Rating</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
	|||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center>
<div class="form"><br>
<center><h2>RATING</h2><br>
<p><a href="reftarget.php">Set Reference rating</a><p>
<p><a href="employeeperf.php">Rate Employees Performance</a><p>	
	<br><br></center>
</div>
</body>
</html>