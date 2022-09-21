<?php
$cookie=$_COOKIE["LoginName"];
    $name=$_POST["product"];
    $quant=$_POST["quantity"];

    if($name == "舒潔衛生紙"){
        $price=99;
    }
    if($name == "黑人牙膏"){
        $price=30;
    }
    if($name == "掃把組"){
        $price=100;
    }
    if($name == "拖把組"){
        $price=200;
    }
    if($name == "抹布"){
        $price=20;
    }
    if($name == "Persil洗衣精"){
        $price=666;
    }
    if($name == "泡舒洗碗精"){
        $price=50;
    }
    if($name == "毛巾"){
        $price=186;
    }

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="INSERT INTO shoppingcart(studentNo,productName,price,quantity) VALUES('$cookie','$name','$price','$quant')";
$result=mysqli_query($con,$SQL); 
header('location:shop.php');
?>