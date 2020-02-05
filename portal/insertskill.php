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
if(isset($_POST['new']) && $_POST['new']==1){
    $module = $_POST['module'];
    $skillset =$_REQUEST['skillset'];
    $units =$_REQUEST['units'];
    $learn =$_REQUEST['learning'];
$ins_query="insert into skill(module,skillset,units,learning)values('$module','$skillset','$units','$learn')";
    mysqli_query($con,$ins_query)
    or die(mysqli_error($con));
    $status = "Skill Inserted Successfully.
    </br></br><a href='viewskill.php'>View Skills</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="style1.css" />
</head>
<body>
    <center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
  |||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center>

<div class="form">
</div>


<center><h1>Add a Skill-Set</h1>

<form name="form" method="post" action=""> 


<input type="hidden" name="new" value="1" />

<font size="4"><h2><select id='module' name='module' size='1' required>
     <option value='0'>Select Module</option>
  <option value="1.EE Design">EE Design</option>
  <option value="2.EE Analysis">EE Analysis</option>
  <option value="3.Verification and Validation Test">Verification and Validation Test</option>
  <option value="4.Requirement Engineering">Requirement Engineering</option>
  <option value="5.Manufacture and Sample building">Manufacture and Sample building</option>
   <option value="6.Tools,Process and Methods">Tools,Process and Methods</option>
    <option value="7.Project Leadership">Project Leadership</option>
     <option value="8.Soft Skills">Soft Skills</option>
</select></h2>
<p><input size="4" type="text" name="skillset" placeholder="Enter skillset" required /></p>
<p><textarea size="5" name="units" rows="6" cols="80" placeholder="Enter the units" required /></textarea></p></font>

<p><input type="text" name="learning" placeholder="Learning "/></p>

<p><input name="submit" type="submit" value="Submit" /></p>


</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</center>
</body>
</html>