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
		$id=$_REQUEST['id'];
		$query = "SELECT * from team where slno='".$id."'"; 
		$result = mysqli_query($con, $query) or die ( mysqli_error($con));
		$row = mysqli_fetch_assoc($result);
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
	|||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center>
<div class="form">

<h2><u>Update Team Members</u></h2>
		<?php
					$status = "";
					if(isset($_POST['new']) && $_POST['new']==1)
					{
					$id=$_REQUEST['id'];
					$name =$_REQUEST['name'];
					$job =$_POST['job'];
					$since =$_REQUEST['since'];
					$func =$_REQUEST['func'];
					$update="UPDATE team SET name='".$name."', masterjob='".$job."',
					inconti='".$since."',currentfuncarea='".$func."' where slno='".$id."'";
					mysqli_query($con, $update) or die(mysqli_error($con));
					$status = "Record Updated Successfully. </br></br>
					<a href='view.php'>View Team Members</a>";
					echo '<p style="color:#FF0000;">'.$status.'</p>';
					}
					else 
					{ 
		?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />


<input name="id" type="hidden" value="<?php echo $row['slno'];?>" />

<b>Employee Name</b><br>
<input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" />

<br>	
<br>
<b>Select Master Job</b><br>
<?php 
        $result2 = $con->query("SELECT masterjob from role");
        echo "<select name='job' id='job' >";
     while ($row2 = $result2->fetch_assoc()) 
     {    
   ?> 
   <option value='<?php echo $row2['masterjob']; ?>'><?php echo $row2['masterjob']; ?></option>"
<?php	
	      }
    echo "</select>";
 ?>
 <br><br>
<b>Working in Continenal Since</b>
<input type="text" name="since" placeholder="In Conti Since" 
required value="<?php echo $row['inconti'];?>" />
<br><br>
<b>Current Function Area</b>
<input type="text" name="func" placeholder="Current Function Area" 
required value="<?php echo $row['currentfuncarea'];?>" />


<p><input name="submit" type="submit" value="Update" /></p>
</form>
</div>
<?php   }   ?>	
</body>
</html>