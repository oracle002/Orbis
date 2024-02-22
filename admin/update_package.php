<?php

session_start();
if( !isset($_SESSION['AdminLoginId']))
{
    header("location: Admin Login.php");
}

include("connection.php");
$id = intval($_GET['id']);
$quey = "SELECT * FROM `tbltourpackages` WHERE PackageId = $id";
$result=mysqli_query($conn,$quey);
$new=mysqli_fetch_assoc($result);

if(isset($_POST['submit']))
{
    $pname=$_POST['packagename'];
    $ptype=$_POST['packagetype'];   
    $plocation=$_POST['packagelocation'];
    $pprice=$_POST['packageprice']; 
    $pfeatures=$_POST['packagefeatures'];
    $pdetails=$_POST['packagedetails']; 
    $pimage=$_FILES["packageimage"]["name"];


        $query="UPDATE tbltourpackages SET PackageName='$pname',PackageType='$ptype',PackageLocation='$plocation',PackagePrice='$pprice',PackageFetures='$pfeatures',PackageDetails='$pdetails', PackageImage='$pimage' WHERE PackageId='$id'";
        $user_result=mysqli_query($conn,$query);
        if($user_result){
            echo"<script>
            alert('package update');
            window.location.href='viewpackage.php';
            </script>";
        }else{
            echo"<script>
            alert('package updation failed');
            window.location.href='viewpackage.php';
            </script>";
        }

}
if(isset($_POST['delete']))
{
    $query = "DELETE FROM tbltourpackages WHERE PackageId = '$id'";
    $result=mysqli_query($conn,$query);
    if($result){
            echo"<script>
            alert('package deleted');
            window.location.href='viewpackage.php';
            </script>";
        }else{
            echo"<script>
            alert('package deletion failed');
            window.location.href='viewpackage.php';
            </script>";
        }

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


</div>

<div class="container mt-5" style="margin-left:200px;">
    <h3>Update Package</h3>


    <div class="row">
    
        <form method="post" enctype="multipart/form-data" >
            <div class="col-9 mt-3" >
                
                <div class="input-group input-group-lg" style="margin-left:10px;">
                   <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                    <div>
                    <input type="text" class="form-control1" name="packagename" id="packagename" value="<?php echo $new['PackageName']; ?>" ><br>
                    </div>
                </div>
                
            </div>
            <div class="col-9 mt-3" >
            
                <div class="input-group input-group-lg " style="margin-left:10px;">
                    <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
                    <div>
                    <input type="text" class="form-control1" name="packagetype" id="packagetype" value="<?php echo $new['PackageType']; ?>" ><br>
                    </div>
                </div>
            
            </div>
            <div class="col-9 mt-3" >
            
                <div class="input-group input-group-lg " style="margin-left:10px;">
                    <label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
                    <div>
                    <input type="text" class="form-control1" name="packagelocation" id="packagelocation"  value="<?php echo $new['PackageLocation']; ?>" ><br>
                    </div>
                </div>
            
            </div>
            <div class="col-9 mt-3" >
            
                <div class="input-group input-group-lg " style="margin-left:10px;">
                    <label for="focusedinput" class="col-sm-2 control-label">Package Price in USD</label>
                    <div>
                    <input type="text" class="form-control1" name="packageprice" id="packageprice"  value="<?php echo $new['PackagePrice']; ?>" ><br>
                    </div>
                </div>
            
            </div>
            <div class="col-9 mt-3" >
                
                <div class="input-group input-group-lg" style="margin-left:10px;">
                   <label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
                   <div>
                    <input type="text" class="form-control1" name="packagefeatures" id="packagefeatures"  value="<?php echo $new['PackageFetures']; ?>" ><br>
                    </div>
                </div>
                
            </div>
            <div class="col-9 mt-3" >
                
                <div class="input-group input-group-lg" style="margin-left:10px;">
                   <label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
                    <div>
                    <textarea class="form-control1" rows="5" cols="50" name="packagedetails" id="packagedetails"><?php echo $new['PackageDetails']; ?></textarea>
                    </div> 
                </div>
                
            </div> 
            <div class="col-9 mt-3">
                <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                <img src="pacakgeimages/<?php echo htmlentities($new['PackageImage']); ?>" width="200" height="200"/><br>

                <input type="file" name="packageimage" id="packageimage" >              
            </div>
            <div class="col-3 mt-3">
                <div class="input-group mb-3 input-group-lg" style="margin-left: 720px;">
                <button type="submit" name="submit" class="btn btn-success btn-sm me-1">Update</button>
                 <button type="delete" name="delete" class="btn btn-danger btn-sm me-1">Delete</button>

                <button type="reset" class="btn btn-outline-info btn-sm">Reset</button>
                </div>
            </div>
        </form>

    </div>

</div>


</body>
</html>