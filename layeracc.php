<?php
session_start();

if(isset($_SESSION["Mlogin"]))
{
	if($_SESSION["Mlogin"]=="No"){
    header ('location:index.php');
    }
}
else{
	header ('location:index.php');
}
?>

<html>
<link rel="stylesheet" type="text/css" href="layeracc.css">

<body class="body">

<form action="addlayer.php" method="POST" class="word">
新增樓長帳號:<input type="text" name="acc"><br/>
密碼:<input type="text" name="pwd"><br/>
樓層:<input type="text" name="lay">
<input type="submit" value="送出" >
</form>
<button type="button" onclick="location.href='admin.php'" class="submit">回到管理者頁面</button>

</body>
</html>

<?php

   $no=@$_POST["No"];
   $con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
   $SQL = "SELECT * FROM layer";
   $result = mysqli_query($con,$SQL) ;
    echo "<table  border='1'>";
	echo    "<tr> 
	        <th>帳號<th/>
	        <th>樓層<th/>
	        <th>密碼<th/>
	        <th>取消帳號<th/>
	    	<tr/>";
   while($row = mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row["帳號"]."<td/>
		  <td>".$row["樓層"]."<td/>
	      <td>".$row["密碼"]."<td/>
	      <td><a href='layerdelete.php?No=".$row["No"]."'>取消帳號<a/><td/>";
	echo "<tr/>";
 	}

 ?>

