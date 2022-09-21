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

<link rel="stylesheet" type="text/css" href="admin.css"/>

<h1 class="h1">管理者首頁</h1>
<form action="" method="POST">
<body class="body">
<p class="title">查詢訂單/輸入學生學號:<input type="text" name="sNo"></p>
</form>

<?php
$no=@$_POST["sNo"];

echo "<table border='1' class='p'>";
echo "<tr>
      <th>學號<th/>
      <th>姓名<th/>
      <th>訂購日期<th/>
      <th>價格<th/>
      <th>繳費情況<th/>
      <th>繳費<th/>
      <th>取消訂單<th/>
      <th>遲繳<th/>
      <tr/>";

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT *FROM orderlist WHERE studentNo='$no'";
$result=mysqli_query($con,$SQL);

echo "<div class='p'>";
while($row=mysqli_fetch_assoc($result)){

	echo "<tr>";
	echo "<td>".@$row["studentNo"]."<td/>
	      <td>".$row["Name"]."<td/>
	      <td>".$row["dates"]."<td/>
	      <td>".$row["price"]."<td/>
	      <td>".$row["paid"]."<td/>
	      <td><a href='pay.php?No=".$row["No"]."'>繳費<a/><td/>
	      <td><a href='rdelete.php?No=".$row["No"]."'>取消訂單<a/><td/>
	      <td><a href='late.php?No=".$row["No"]."'>遲繳<a/><td/><tr/>";
}
echo "</table>";
echo "</div>";
?>

</body>
</html>

<button type="button" onclick="location.href='addproduct.php'" class="w">商品更新</button>
<button type="button" onclick="location.href='layeracc.php'" class="w1">樓長帳號更改</button>
<button type="button" onclick="location.href='studentacc.php'" class="w2">學生帳號更改</button>
<button type="button" onclick="location.href='adminproduct.php'" class="w3">商品總覽</button>
<button type="button" onclick="location.href='background.php'" class="w4">後台分析</button>
<button type="button" onclick="location.href='adminlogout.php'" class="w5">登出</button>
