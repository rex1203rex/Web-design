<?php
session_start();

if(isset($_SESSION["login"]))
{
	if($_SESSION["login"]=="No"){
    header ('location:index.php');
    }
}
else{
	header ('location:index.php');
}
?>
<html>
<link rel="stylesheet" type="text/css" href="product.css">
<body class="body">

<button type="button" onclick="location.href='shop.php'" class="submit">回訂購頁面</button>
<?php
session_start();
echo "<table  border='1'>";
echo	    "<tr> 
	        <th>編號<th/>
	        <th>商品名稱<th/>
	        <th>商品圖示<th/>
	        <th>價格<th/>
	        <th>介紹<th/>
	    </tr>";
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM product";
$result=mysqli_query($con,$SQL); 

while( $row=mysqli_fetch_assoc($result)){
    echo "<tr>";
	echo "<td>".$row["No"]."<td/>
	      <td>".$row["Name"]."<td/>
	      <td><img src='".$row["photo"]."'width='200'><td/>
	      <td>".$row["price"]."<td/>
	      <td>".$row["intro"]."<td/>";
	echo "<tr/>";
}
echo "<table/>";
?>


</body>
</html>