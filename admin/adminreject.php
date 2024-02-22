<?php
session_start();
if( !isset($_SESSION['AdminLoginId']))
{
    header("location: Admin Login.php");
}

require("connection.php");

$oid=$_POST["Order_Id"];  

$query="UPDATE `order_manager` SET `status`='3' WHERE `Order_id` = '$oid'";
$query_result=mysqli_query($con,$query);
if($query_result){
    echo"<script>
    alert('Order Rejected');
    window.location.href='Admin Panel.php';
    </script>";
}

?>