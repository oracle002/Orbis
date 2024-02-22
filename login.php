<?php

if(isset($_POST['loginbtn']))
{
	include('connection.php');
        $email=$_POST['userEmail'];
    	$p1=$_POST['userPassword'];
    	$sql = "SELECT * FROM user WHERE Email='".$email."' AND Password='".$p1."'";
    	$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==1)
		{
			session_start();
			$_SESSION['user_email']=$_POST['userEmail'];
			$_SESSION['user_password']=$_POST['userPassword'];			
			$_SESSION['status']="loggedin";
			header("location:home.php?status=loggedin");	
		}
		else
		{
		    echo "<script type='text/javascript'>alert('Invalid Login Credentials'); window.location='login.php'</script>";          
		}	
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>ORBIS</title>
	<link rel="stylesheet" type="text/css" href="form.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500" rel="stylesheet">
	<link rel="shortcut icon" href="images/icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body class="formbg">
	<div class="full-container">
		<p class="heading" style="color: white;">ORBIS</p>
		<div class="center-container">
			<div class="formWindow" id="userLoginWindow">
			<form method="post">
				<p class="label"><span>Email</span> <input class="userFormInput" type="email" name="userEmail" placeholder="Enter Email " required="Please enter valid email address"> </p>
				<p class="label"><span>Password</span> <input class="userFormInput" type="password" name="userPassword" placeholder="Enter Password" required> </p>
				<p style="color: #ffc312; font-family: Tahoma; font-size: 14px;" align="right"> Forgot Password?</p>
				<p><input type="submit" name="loginbtn" value="Login" class="yellowBtn"></p>
				<p class="formText">Don't have an account? Click to <a href=register.php style="text-decoration: none; color: #ffc312;">Sign Up </a></p>
				<p align="right"><a href="admin/Admin Login.php" style="text-decoration:none; color: #ffc312;">Admins Here!!</a></p>
			</form>
			</div>
		</div>
	</div>
	
</body>
</html>
