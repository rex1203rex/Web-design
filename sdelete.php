<?php
session_start();
$cookie=$_COOKIE["LoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="INSERT INTO analysis(product,quant) SELECT productName,quantity FROM shoppingcart";
$result=mysqli_query($con,$SQL);

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="DELETE FROM shoppingcart WHERE studentNo='$cookie'";
$result=mysqli_query($con,$SQL);
header('location:shop.php');
?>