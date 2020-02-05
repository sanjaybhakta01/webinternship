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

    if(isset($_POST['new']) && $_POST['new']==1){
        $job=$_REQUEST['job'];
    $ins_query="INSERT into role(masterjob)values('$job')";
        mysqli_query($con,$ins_query)
        or die(mysqli_error($con));
        $status = "Master Job Inserted Successfully.
        </br></br><a href='insert.php'>Insert Team Members</a>";
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Master Job</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <center><img src="/portal/images/contilogo.png"><p><a href="dashboard.php">Dashboard</a>  
  |||<b>SKILL DEVELOPEMENT PORTAL</b>||| <a href="logout.php">Logout</a></p></center> 

<div class="form">
<div>


<h1>Add a Master Job</h1>
<forsm name="form" method="post" action=""> 


<input type="hidden" name="new" value="1" />

<p><input type="text" name="job" required /></p>

<p><input name="submit" type="submit" value="Submit" /></p>

</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>