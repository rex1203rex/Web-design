
<html>
<link rel="stylesheet" type="text/css" href="adminproduct.css">
<body class="body">

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

<button type="button" onclick="location.href='admin.php'" class="w5">回頁面</button>

<?php
echo "<table  border='1' class='p'>";
echo	    "<tr> 
	        <th>編號<th/>
	        <th>商品名稱<th/>
	        <th>商品圖示<th/>
	        <th>價格<th/>
	        <th>介紹<th/>
	        <th>刪除商品<th/>
	    </tr>";
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM product";
$result=mysqli_query($con,$SQL); 

echo "<div class='p'>";
while( $row=mysqli_fetch_assoc($result)){
    echo "<tr>";
	echo "<td>".$row["No"]."<td/>
	      <td>".$row["Name"]."<td/>
	      <td><img src='".$row["photo"]."'width='200'><td/>
	      <td>".$row["price"]."<td/>
	      <td>".$row["intro"]."<td/>
	      <td><a href='pdelete.php?No=".$row["No"]."'>刪除商品<a/><td/>";
	echo "<tr/>";
}
echo "</table>";
echo "</div>";
?>

</body>
</html>