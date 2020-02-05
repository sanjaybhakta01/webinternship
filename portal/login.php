<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="style.css" />
	</head>
<body>

	<?php
		$con = mysqli_connect("localhost","root","","portal");
		if (mysqli_connect_errno())
		{
			 echo "Failed to connect to MySQL: " . mysqli_connect_error();
			 die();
		 }
		 
		date_default_timezone_set('Asia/Kolkata');
		$error="";
		session_start();
		// If form submitted, insert values into the database.
		if (isset($_POST['username']))
		{
			        // removes backslashes
		 $username = stripslashes($_REQUEST['username']);
		        //escapes special characters in a string
		 $username = mysqli_real_escape_string($con,$username);
		 $password = stripslashes($_REQUEST['password']);
		 $password = mysqli_real_escape_string($con,$password);
		 //Checking is user existing in the database or not
		 $query = " SELECT * FROM `users` WHERE username='$username'and password='".md5($password)."' ";
		 $result = mysqli_query($con,$query) or die(mysql_error());
		 $rows = mysqli_num_rows($result);
		 if($rows==1)
		 {
		     $_SESSION['username'] = $username;
		            // Redirect user to index.php
		     header("Location: dashboard.php");
		 }
		  else
		  {
		 		 echo "<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to <a href='login.php'>Login</a></div>";
		 }
		    }
	else
	{
	?>
		<div class="form">
			<img src="/portal/images/contilogo.png">
			<center><h1>SKILL DEVELOPMENT PORTAL</h1><br>
			<h2><font color="#e32e12">Login</h2></font>
			<form class="box"action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
			
		</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p></center>
		</div>
	<?php } ?>
</body>
</html>
