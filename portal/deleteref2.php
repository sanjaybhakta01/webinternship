<?php
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
$skillset=$_REQUEST['skillset'];
$masterjob=$_REQUEST['masterjob'];
$query = "DELETE FROM skillref WHERE masterjob='$masterjob' AND skillset='$skillset'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: setrefskill.php"); 
?>