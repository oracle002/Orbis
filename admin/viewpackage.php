<?php   
session_start();
if( !isset($_SESSION['AdminLoginId']))
{
    header("location: Admin Login.php");
}

include("connection.php");



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
        a {
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

<div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    echo '<table class="table text-center table-dark table-hover">';
                    echo '<tr>';
                    echo '<th scope="col">Package_id</th>';
                    echo '<th scope="col">Package Name</th>';
                    echo '<th scope="col">Location</th>';
                    echo '<th scope="col">Price</th>';
                    echo '<th scope="col">Creation Date</th>';
                    echo '<th scope="col">Action</th>';
                    echo '</tr>';
                    $quey="SELECT * FROM `tbltourpackages`";
                    $user_result=mysqli_query($conn,$quey);
                    while($user_fetch=mysqli_fetch_assoc($user_result))
                     {
                        echo '<tr>';
                        echo '<td>' .$user_fetch['PackageId'] . '</td>';
                        echo '<td>' . $user_fetch['PackageName'] . '</td>';
                        echo '<td>' . $user_fetch['PackageLocation'] . '</td>';
                        echo '<td>' . $user_fetch['PackagePrice'] . '</td>';
                        echo '<td>' . $user_fetch['Creationdate'] . '</td>';
                        echo '<td> <button onclick="location.href=\'update_package.php?id=' . $user_fetch['PackageId'] . '\'">Edit</button> </td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                ?>
            </div>
        </div>
    </div>



</body>
</html>