<?php
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
$module=$_REQUEST['module'];
$masterjob=$_REQUEST['masterjob'];
$query = "DELETE FROM modref WHERE masterjob='$masterjob' AND module='$module'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: setrefmod.php"); 
?>