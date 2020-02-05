<?php
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
$skillset=$_REQUEST['skillset'];
$query = "DELETE FROM skill WHERE skillset='$skillset'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error($con));
header("Location: viewskill.php"); 
?>