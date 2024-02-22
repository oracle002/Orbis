<?php

include('connection.php');
if(isset($_POST['Login']))
{

        $email=$_POST['adminEmail'];
        $p1=$_POST['adminPwd'];
        $sql = "SELECT * FROM admin WHERE Email='".$email."' AND Password='".$p1."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['admin_email']=$_POST['adminEmail'];
            $_SESSION['admin_password']=$_POST['adminPwd'];         
            $_SESSION['status']="loggedin";
            $_SESSION['AdminLoginId']=$email;
            header("location:Admin.php?status=loggedin");   
        }
        else
        {
            echo "<script type='text/javascript'>alert('Invalid Login Credentials'); window.location='Admin login.php'</script>";           
        }   
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="myform">
            <form method="POST">
                <h2>ADMIN LOGIN</h2>
                <input type="text" placeholder="Admin Name" name="adminEmail">
                <input type="password" placeholder="password" name="adminPwd">
                <button type="submit" name="Login">Login</button><br><br>
                Not an admin? <a href="../index.php" style="text-decoration:none;">Back to home</a>
            </form>
        </div>
    </div>
</body>
</html>