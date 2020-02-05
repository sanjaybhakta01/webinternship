<?php
		$con = mysqli_connect("localhost","root","","portal");
		    if (mysqli_connect_errno()){
		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
		 die();
		 }
		 $error="";
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
	
		$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		    $masterjob =$_POST['masterjob'];
		    $module = $_POST['module'];
		    $rating =$_REQUEST['rating'];
		$ins_query="INSERT INTO modref(masterjob,module,rating)values('$masterjob','$module','$rating')";
		    mysqli_query($con,$ins_query);
		       $status = "REFERENCE LEVEL SET Successfully.
		    </br></br><a href='setref.php'>SET REFERENCE</a>";
		 
		}
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
<center>


<table width="800px" height="100px" border="2" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>MODULE</strong></th>
<th><strong>REFERENCE RATING</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php

				$count=1;
				//DUPLICATE MODULES
				$sel_query="Select * from modref ORDER BY masterjob;";
				$result = mysqli_query($con,$sel_query);
				$uni=array();
				while($row = mysqli_fetch_assoc($result)) {
				$uni[]=$row["masterjob"];}
				$mod=array_unique($uni);
				//PRINT WITHOUT DUPLICATES
		$sel_query2="Select * from modref ORDER BY masterjob;";
		$result = mysqli_query($con,$sel_query2);
		$c=0;
		error_reporting(E_ALL ^ E_NOTICE);
		while($row = mysqli_fetch_assoc($result)) {?>

		<tr>
		<td  colspan="4"><b><font size=5><?php
		if(strcmp($mod[$c++], $row["masterjob"])==0)
		{echo $row["masterjob"];} ?>

		</b></font></td></tr>


		<td align="center">
		<tr>
		<font size=3>
		<td align="center"><?php echo $row["module"];  ?></td>
		<td align="center"><?php echo $row["rating"];  ?></td>
		<td align="center">
		<a href="deleteref.php?module=<?php echo $row["module"]; ?>&masterjob=<?php echo $row["masterjob"]; ?>">Delete</a></td>
		</font>
		</td></tr>
		<?php $count++;} ?>
		</tbody>
</table>
<br>
<br>


<b><u>SET REFERENCE LEVEL</u></b><br><br>
<form name="form" method="post" action=""> 
<br>
Rating Criteria	<br>
------------------<br>
0 --->  No Knowledge<br>
1 --->	Basic Knowledge<br>
2 --->	Limited hands on experience<br>
3 --->	Execution with limited support<br>
4 --->	Independent execution<br>
5 --->	Define and lead<br>
<br>

<input type="hidden" name="new" value="1" />
SELECT THE MASTERJOB<br><br>
		<?php 
		$con = mysqli_connect("localhost","root","","portal");
		    if (mysqli_connect_errno()){
		 echo "Failed to connect to MySQL: " . mysqli_connect_error();
		 die();
		 }
		        $result = $con->query("SELECT masterjob from role");


		    echo "<select name='masterjob' id='masterjob' >";
		    while ($row = $result->fetch_assoc()) {
		        unset($masterjob);
		        $masterjob = $row['masterjob'];
		        echo '<option value=" '.$masterjob.'"  >'.$masterjob.'</option>';
		    }
		    echo "</select>";
		?>
<br><br>
SELECT THE MODULE<br><br>
		<?php 
				$con = mysqli_connect("localhost","root","","portal");
				    if (mysqli_connect_errno()){
				 echo "Failed to connect to MySQL: " . mysqli_connect_error();
				 die();
				 }
				        $result = $con->query("SELECT DISTINCT module from skill");
				    echo "<select name='module' id='module' >";
				    while ($row = $result->fetch_assoc())
				     {
				        unset($module);
				        $module = $row['module'];
				        echo '<option value=" '.$module.'"  >'.$module.'</option>';
				    }
				    echo "</select>";
		?>
<br><br>
SET REFERENCE RATING
<input type="number" name="rating">


<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p></center>
</center>
</body>
</html>
