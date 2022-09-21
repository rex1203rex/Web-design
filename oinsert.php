<?php
session_start();
$coo=$_COOKIE["LoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT *FROM student WHERE 學號='$coo'";
$result=mysqli_query($con,$SQL);
while($row=mysqli_fetch_assoc($result)){
$floor=$row["樓層"];
$room=$row["roomNo"];
$name=$row["Name"];
}
$price=$_COOKIE["total"];
$paid="尚未繳費";
$dates=date("Y.m.d");
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT *FROM shoppingcart WHERE studentNo='$coo'";
$result=mysqli_query($con,$SQL);
while($row=mysqli_fetch_assoc($result)){
	$_SESSION["order"].=$row["productName"]."*".$row["quantity"]."";
}

$order=$_SESSION["order"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL1="INSERT INTO orderlist(studentNo,Name,樓層,房號,productquantity,dates,price,paid) VALUES('$coo','$name','$floor','$room','$order','$dates','$price','$paid')";
if($result=mysqli_query($con,$SQL1)){
	$con=mysqli_connect('localhost:21','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
    $SQL2="INSERT INTO analysis(orders) VALUES('1')";
    $result=mysqli_query($con,$SQL2);
header('location:sdelete.php');
}else{
	echo $order."<br/>";
	echo "送出失敗";
}
?>