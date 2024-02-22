<?php   
session_start();
if( !isset($_SESSION['AdminLoginId']))
{
    header("location: Admin Login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

    <style>
        body{
            margin:0;
            background-color: white;
        }
        div.header{
            color: #f0f0f0;
            font-family: poppins;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            background-color: #1c1c1e;
        }
        div.header button{
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
        a{
            color: #337ab7;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
         <h1><a href="Admin.php">Admin Panel</a></h1>
        <form method="post">
            <button type="submit" name="Logout">Log out</button>
        </form>
         <?php
        if(isset($_POST['Logout'])){
            session_destroy();
            header("location: Admin Login.php");
        }

    ?>
    </div>

        <div class="container">
            <div class="row mt-5 ">
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div  class="card bg-dark" style="width: 20rem;">
                        <div class="card-body text-light bg-dark">
                            <h5 class="card-title">View Packages</h5><br>
                            <p class="card-text">View Current Packages</p><br><br>
                            <a href="viewpackage.php" class="btn btn-primary">Packages</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card bg-dark" style="width: 20rem;">
                        <div class="card-body text-light bg-dark">
                            <h5 class="card-title">Bookings</h5>
                            <p class="card-text">Verify Bookings</p>
                            <a href="Admin Panel.php" class="btn btn-primary">Bookings</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card bg-dark" style="width: 20rem;">
                        <div class="card-body text-light bg-dark">
                            <h5 class="card-title">Add Package</h5><br>
                            <p class="card-text">Add More Package</p><br><br>
                            <a href="addpackage.php" class="btn btn-primary">Add</a>
                        </div>
                    </div>
            </div>
            <div class="row mt-5 ">
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card bg-dark" style="width: 20rem;">
                        <div class="card-body text-light bg-dark">
                            <h5 class="card-title">Users</h5><br>
                            <p class="card-text">View Users List</p><br><br>
                            <a href="viewuser.php" class="btn btn-primary">Users</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card bg-dark" style="width: 20rem;">
                        <div class="card-body text-light bg-dark">
                            <h5 class="card-title">View Enquiries</h5>
                            <p class="card-text">Enquiries</p>
                            <a href="viewenq.php" class="btn btn-primary">Enquiries</a>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
