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
		$slno=$_REQUEST['slno'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rate an Employee</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
	|||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center>


<h2><u>Rate an Employee</u></h2>
		
<div>
<?php
$query = "SELECT name,masterjob from team where slno='".$slno."'"; 
		$result = mysqli_query($con, $query) or die ( mysqli_error($con));
		while($row = mysqli_fetch_assoc($result))
		 {
		 	echo "EMPLOYEE NAME----    ";
		 	?>  <?php
		 	echo $row['name'];
		 	?> <br> <?php
		 	echo "EMPLOYEE's MASTERJOB----   ";
		 	?>  <?php
		 	echo $row['masterjob'];
		 }
		 ?>
<a href="setrefmod.php">RATE FOR MODULES</a><br><br><br>
  <a href="setrefskill.php">RATE FOR SKILLSETS</a> </center>

 <br><br>
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

<?php
$status = "";
		if(isset($_POST['new']) && $_POST['new']==1)
		{
		    $slno =$_REQUEST['slno'];
		    $module = $_POST['module'];
		    $rating =$_REQUEST['rating'];
		$ins_query="INSERT INTO modrating(slno,module,rating)values('$slno','$module','$rating')";
		    mysqli_query($con,$ins_query);
		       $status = "RATED Successfully.
		    </br></br><a href='individualrating.php'>RATE AN EMPLOYEE</a>";
		 
		}
		else
		{
?>

<?php
	$query = "SELECT slno from team where slno='".$slno."'"; 
			$result = mysqli_query($con, $query) or die ( mysqli_error($con));
			while($row = mysqli_fetch_assoc($result))
			 {?>
<form name="form" method="post" action="">
<b>RATE THE MODULE</b> <br><br>
EMPLOYEE ID
<input type="hidden" name="new" value="1" />
 <input type="number" name="slno" placeholder="<?php echo $row['slno']; ?>" value="<?php echo $row['slno']; ?>" required readonly /> <?php } ?>
 <br><br>SELECT THE MODULE<br><br>
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
<br><br>	SET  RATING <br><br>
<input type="number" name="rating">
 

<p><input name="submit" type="submit" value="Submit" /></p>
</center>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p></center>
 <?php 
}
		 	?>



<?php
$status1 = "";
		if(isset($_POST['new2']) && $_POST['new2']==2)
		{
		    $slno =$_REQUEST['slno'];
		    $skillset = $_POST['skillset'];
		    $rating =$_REQUEST['rating'];
		$ins_query2="INSERT INTO skillrating(slno,skillset,rating)values('$slno','$skillset','$rating')";
		    mysqli_query($con,$ins_query2);
		       $status1 = "RATED Successfully.
		    </br></br><a href='individualrating.php'>RATE AN EMPLOYEE</a>";
		 
		}
		else{
?>



<form name="form" method="post" action="">
<?php
	$query = "SELECT slno from team where slno='".$slno."'"; 
			$result = mysqli_query($con, $query) or die ( mysqli_error($con));
			while($row = mysqli_fetch_assoc($result))
			 {
	?>
<b>RATE THE SKILLSETS</b><br><br>
<input type="hidden" name="new2" value="2" />
EMPLOYEE ID
 <input type="number" name="slno" placeholder="<?php echo $row['slno']; ?>" value="<?php echo $row['slno']; ?>" required readonly /> <?php    }   ?>
 <br><br>SELECT THE SKILLSET<br><br>
		<?php 
				$con = mysqli_connect("localhost","root","","portal");
				    if (mysqli_connect_errno()){
				 echo "Failed to connect to MySQL: " . mysqli_connect_error();
				 die();
				 }
				        $result = $con->query("SELECT DISTINCT skillset from skill");
				    echo "<select name='skillset' id='skillset' >";
				    while ($row = $result->fetch_assoc())
				     {
				        unset($skillset);
				        $skillset = $row['skillset'];
				        echo '<option value=" '.$skillset.'"  >'.$skillset.'</option>';
				    }
				    echo "</select>";
		?>
<br><br>	SET RATING <br><br>
<input type="number" name="rating">
<p><input name="submit" type="submit" value="Submit" /></p>
</center>
</form>
<p style="color:#FF0000;"><?php echo $status1; ?></p>
<?php } ?>
</body>
</html>