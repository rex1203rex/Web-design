<?php
session_start();

$sNo=$_POST["studentNo"];
$pwd=$_POST["password"];

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');

$SQL="SELECT * FROM background WHERE 學號='$sNo' AND 密碼='$pwd'";
$result=mysqli_query($con,$SQL);
$Manage= mysqli_num_rows($result);

$SQL2="SELECT * FROM layer WHERE 帳號='$sNo' AND 密碼='$pwd'";
$result2=mysqli_query($con,$SQL2);
$layer=mysqli_num_rows($result2);

$SQL3="SELECT * FROM student WHERE 學號='$sNo' AND 密碼='$pwd'";
$result3=mysqli_query($con,$SQL3);
$student=mysqli_num_rows($result3);


if ($Manage>0) {
	$_SESSION["Mlogin"]="Yes";
	$date = strtotime("+7 days",time());
	setcookie("LoginName",$sNo,$date);
	header('Location:admin.php');
}
else if ($layer>0) {
	$_SESSION["Llogin"]="Yes";
	$date = strtotime("+7 days",time());
	setcookie("LLoginName",$sNo,$date);
	header('Location:layer.php');
}
else if($student>0){

		$_SESSION["login"]="Yes"; 
		$date = strtotime("+7 days",time());

	    setcookie("LoginName",$sNo,$date);
		header('Location:shop.php');
	}	

else
	{
		header('Location:index.php');
	}
		

?>