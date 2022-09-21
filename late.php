<?php
session_start();
$No=$_GET["No"];

    $con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
    $SQL2="UPDATE orderlist SET paid='遲繳' WHERE No='$No'";
    $result=mysqli_query($con,$SQL2);


header('location:admin.php');
?>