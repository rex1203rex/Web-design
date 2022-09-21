<?php
$cookie=$_COOKIE["adminLoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM background WHERE account='$cookie'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);
if($row["admin"]=="0"){
	header('location:admin.php');
}
else{
	header('locaiton:floor.php');
}
?>