<?php
	$acc=$_POST["acc"];
	$pwd=$_POST["pwd"];
	$lay=$_POST["lay"];
	$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');	
	$SQL = "INSERT INTO layer(帳號,密碼,樓層) VALUES('$acc','$pwd','$lay')";
	if($result = mysqli_query($con,$SQL)) {
		header('Location:layeracc.php');
	}else{
		echo "failed";
	}

?>