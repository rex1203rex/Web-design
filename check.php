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
<link rel="stylesheet" type="text/css" href="check.css"/>
<body class="body">


<center>
<h1><font face="Microsoft JhengHei">
宿舍生活用品訂購系統
</h1><br/></font>
<h1><font face="Microsoft JhengHei">
訂單查詢<br/></font>
<button type="button" onclick="location.href='shop.php'">回訂購頁面</button>
</h1>
<?php
$coo=$_COOKIE["LoginName"];
echo "<table  border='1'>";
echo	    "<tr> 
	          <th>訂單編號<th/>
	          <th>學號<th/>
	          <th>訂單<th/>
	          <th>訂購時間<th/>
	          <th>金額<th/>
	          <th>繳費狀態<th/>
	          <th>取消訂單<th/>
	        <tr/>";
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM orderlist WHERE studentNo='$coo'";
$result=mysqli_query($con,$SQL); 
while( $row=mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "
	      <td>".$row["No"]."<td/>
	      <td>".$row["studentNo"]."<td/>
	      <td>".$row["productquantity"]."<td/>
	      <td>".$row["dates"]."<td/>
	      <td>".$row["price"]."<td/>
	      <td>".$row["paid"]."<td/>
	      <td><a href='checkdelete.php?No=".$row["No"]."'>取消訂單<a/><tr/>";
}
echo "<table/>";
?>

</body>
</html>