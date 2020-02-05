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
<title>View Records</title>
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
<div class="form">

</div>
<br><br>
<center><h2><u>Team Members</u></h2>
<table width="800px" height="100px" border="2" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Employee ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Master Job</strong></th>
<th><strong>In Continental Since</strong></th>
<th><strong>Current Function Area</strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from team;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td align="center"><?php echo $row["slno"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["masterjob"]; ?></td>
<td align="center"><?php echo $row["inconti"]; ?></td>
<td align="center"><?php echo $row["currentfuncarea"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["slno"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["slno"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
<p><a href="insert.php">Insert a New Team Member</a></p>
</center>
</body>
</html>