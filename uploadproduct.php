<?php
$name=$_POST["name"];
$price=$_POST["price"];
$photo="/photo/".$_POST["photo"];
$quantity=$_POST["quantity"];
$intro=$_POST["intro"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="INSERT INTO product(Name,price,photo,quantity,intro) VALUES('$name','$price','$photo','$quantity','$intro')";
$result=mysqli_query($con,$SQL);
header('location:adminproduct.php');
?>