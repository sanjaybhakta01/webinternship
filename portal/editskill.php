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
$skillset=$_REQUEST['skillset'];
$query = "SELECT * from skill where skillset='".$skillset."'"; 
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

<h1><u>Update Skills</u></h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$module =$_REQUEST['module'];
$skillset =$_REQUEST['skillset'];
$unit =$_REQUEST['unit'];
$learn =$_REQUEST['learning'];
$update="UPDATE skill SET module='".$module."', skillset='".$skillset."',
units='".$unit."',learning='".$learn."' where skillset='".$skillset."'";
mysqli_query($con, $update) or die(mysqli_error($con));
$status = "Record Updated Successfully. </br></br>
<a href='viewskill.php'>View Team Members</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<font size="4">Module Name<br></font>

<font size="4"><h2><select id='module' name='module' size='1'>
  <option value='<?php echo $row['module'];?>' selected='selected'><?php echo $row['module'];?></option>
  <option value="1.EE Design">EE Design</option>
  <option value="2.EE Analysis">EE Analysis</option>
  <option value="3.Verification and Validation Test">Verification and Validation Test</option>
  <option value="4.Requirement Engineering">Requirement Engineering</option>
  <option value="5.Manufacture and Sample building">Manufacture and Sample building</option>
   <option value="6.Tools,Process and Methods">Tools,Process and Methods</option>
    <option value="7.Project Leadership">Project Leadership</option>
     <option value="8.Soft Skills">Soft Skills</option>
</select></h2>
Skillset

<p><input type="text" name="skillset" placeholder="Skillset" 
required value="<?php echo $row['skillset'];?>" /></p>
Unit

<p><input type="text" name="unit" placeholder="Unit" 
required value="<?php echo $row['units'];?>" /></p>
Learning

<p><input type="text" name="learning" placeholder="Learning " 
 value="<?php echo $row['learning'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>

