<?php
session_start();
require("connection.php");
if( !isset($_SESSION['AdminLoginId']))
{
    header("location: Admin Login.php");
}


$oid=$_POST["Order_Id"];  

$query="UPDATE `order_manager` SET `status`='1' WHERE `Order_id` = '$oid'";
$query_result=mysqli_query($con,$query);
if($query_result)
{
    echo"<script>
    alert('Order Accepted');
    window.location.href='Admin Panel.php';
    </script>";
}

?>