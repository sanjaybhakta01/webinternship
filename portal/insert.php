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
    $id=$_REQUEST['id'];
    $name =$_REQUEST['name'];
    $job = $_POST['job'];
    $since =$_REQUEST['since'];
    $func =$_REQUEST['func'];
$ins_query="insert into team(slno,name,masterjob,inconti,currentfuncarea)values('$id','$name','$job','$since','$func')";
    mysqli_query($con,$ins_query)
    or die(mysqli_error($con));
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Team Members</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
  |||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center> 

<div class="form">
<div>


<h1>Add a Team Member</h1>
<form name="form" method="post" action=""> 


<input type="hidden" name="new" value="1" />

<p><input type="text" name="id" placeholder="Enter Employee ID" required /></p>
<p><input type="text" name="name" placeholder="Enter Employee Name" required /></p>
<?php 
$con = mysqli_connect("localhost","root","","portal");
    if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
        $result = $con->query("SELECT masterjob from role");
    echo "<select name='job' id='job' >";
    while ($row = $result->fetch_assoc()) {
        unset($masterjob);
        $masterjob = $row['masterjob'];
        echo '<option value=" '.$masterjob.'"  >'.$masterjob.'</option>';
    }
    echo "</select>";
?>

<a href="addmaster.php">ADD A MASTER JOB</a>
<p><input type="text" name="since" placeholder="Working In Continental Since" required /></p>
<p><input type="text" name="func" placeholder="Current Function Area" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>

</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>