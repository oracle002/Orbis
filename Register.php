<?php
	$servername = 'localhost';
    $username = 'root';
    $password = '';
    $db='letstravel';
    $conn = mysqli_connect($servername,$username,$password,$db);
    
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['register']))
    {
    	$fname=$_POST['userFirstName'];
    	$lname=$_POST['userLastName'];
    	$email=$_POST['userEmail'];
    	$mob=$_POST['userContact'];
    	$p1=$_POST['userPasswd'];
    	$p2=$_POST['userPasswdConf'];
    	if($p1===$p2)
    	{
    		$check = "SELECT Email FROM user where Email='$email'";
        	$result = mysqli_query($conn, $check);
			if (mysqli_num_rows($result) > 0) 
        	{
    			echo "<script type='text/javascript'>alert('User already exists! Please login to continue.'); window.location='userlogin.html'</script>";
        	}
        	else
        	{
    	 		$sql = "INSERT INTO user (FirstName,LastName, Email, Password, Mobile) VALUES ('".$fname."','".$lname."','".$email."','".$p1."',".$mob.")";
    	 		if ($conn->query($sql) === TRUE) 
				{
                    echo "<script type='text/javascript'>alert('Registration Successful!'); window.location='home.php'</script>";

				} 
				else 
				{
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
    	 	}
    	}
    	else
    	{
            echo "<script type='text/javascript'>alert('Passwords do not match.'); window.location='register.html'</script>";
    	}
    }

	$conn->close();
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
        <p class="heading" style="color: white">ORBIS</p>
        <div class="center-container">
            <div class="formWindow" id="userRegisterWindow">
                <form action="register.php" method="post">
                    <p class="label"><span>First Name</span> <input class="userFormInput" type="text" name="userFirstName" placeholder="Enter First Name" id="fname" onblur="return checkname(this);" required><span id="fn"></span></p>
                    <p class="label"><span>Last Name</span> <input class="userFormInput" type="text" name="userLastName" placeholder="Enter Last Name" id="lname" onblur="return checkname(this);" required><span id="ln"></span></p>
                    <p class="label"><span>Email</span> <input  class="userFormInput" type="email" name="userEmail" placeholder="Enter Email" id="email" onblur="return checkmail();" required><span id="eid"></span></p>
                    <p class="label"><span>Mobile </span><input class="userFormInput" type="text" name="userContact" placeholder="Enter Mobile Number" id="mob" onblur="return checkmob();" required><span id="mobile"></span></p>
                    <p class="label"><span>Password</span> <input class="userFormInput" type="password" name="userPasswd" placeholder="Enter Password" id="pw" required></p>
                    <p class="label"><span>Confirm Password </span><input class="userFormInput" type="password" name="userPasswdConf" placeholder="Confirm Password" id="cpw" onblur="return checkpwd();" required><span id="cpwd"></span></p>
                    <p><input type="submit" name="register" class="yellowBtn" value="Sign Up"></p>
                    <p class="formText">Already have an account? Click to <a href=login.php style="text-decoration: none; color: #ffc312;">Log in</a></p>
                    <p class="formText">By signing up, you agree to ORBIS <a href=# style="text-decoration: none; color: #ffc312;">Terms and Conditions</a>.</p>
                </form> 
            </div>
        </div>      
    </div>
    
</body>
<script type="text/javascript" src="js/validation.js"></script>
</html>