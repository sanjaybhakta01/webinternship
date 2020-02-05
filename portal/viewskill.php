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
		$status = "";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Skills</title>
<link rel="stylesheet" href="style.css" />
<style>
	th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
	<center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
	|||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center>
<center><h2><u>Skillsets available</u></h2>
	<p><a href="insertskill.php">Insert a skill</a><p>

<table width="1080px" height="80px" border="5" style="border-collapse:collapse;">
		<thead>
		<tr>
		<th><strong>Know-how/Competence items</strong></th>
		<th><strong>Description</strong></th>
		<th><strong>Edit</strong></th>
		<th><strong>Delete</strong></th>
		</tr>
		</thead>
		<tbody>
		<?php

				$count=1;
				//DUPLICATE MODULES
				$sel_query="Select * from skill ORDER BY module;";
				$result = mysqli_query($con,$sel_query);
				$uni=array();
				while($row = mysqli_fetch_assoc($result)) {
				$uni[]=$row["module"];}
				$mod=array_unique($uni);
				//PRINT WITHOUT DUPLICATES
		$sel_query2="Select * from skill ORDER BY module;";
		$result = mysqli_query($con,$sel_query2);
		$c=0;
		error_reporting(E_ALL ^ E_NOTICE);
		while($row = mysqli_fetch_assoc($result)) {?>

		<tr>
		<td  colspan="4"><b><font size=5><?php
		if(strcmp($mod[$c++], $row["module"])==0)
		{echo $row["module"];} ?>

		</b></font></td></tr>


		<td align="center">
		<tr>
		<font size=3>
		<td align="center"><?php echo $row["skillset"];  ?></td>
		<td align="center"><?php echo $row["units"];  ?></td><td><a href="editskill.php?skillset=<?php echo $row["skillset"]; ?>">Edit</a></td>
		<td align="center">
		<a href="deleteskill.php?skillset=<?php echo $row["skillset"]; ?>">Delete</a></td>
		</font>
		</td></tr>
		<?php $count++;} ?>
		</tbody>
</table>

</body>
</html>