<?php
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
date_default_timezone_set('Asia/Kolkata');
$error="";
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>SET REFERENCE RATING</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
  |||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center> 
<br><br>
 <center> <a href="setrefmod.php">SET REFERENCE RATING FOR MODULES</a><br><br><br>
  <a href="setrefskill.php">SET REFERENCE RATING FOR SKILLSETS</a> </center>
</body>
</html>