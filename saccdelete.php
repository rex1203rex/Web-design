<?php

$No=$_GET["No"];

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');

$SQL="DELETE FROM student WHERE No='$No'";

if($result=mysqli_query($con,$SQL)){
	header('location:studentacc.php');
}
else{
	echo "刪除失敗";
}
?>