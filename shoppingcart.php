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
<link rel="stylesheet" type="text/css" href="shoppingcart.css"/>
<body class="body">

<?php
$cookie=$_COOKIE["LoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM shoppingcart WHERE studentNo='$cookie'";
$result=mysqli_query($con,$SQL);
	echo "<div class='p'>";
    echo "同學，以下是你選購的商品，請確認:";
    echo "</div>";
	echo "<table  border='1' class='p'>";
	echo     "<tr> 
	          <th>訂單編號<th/>
	          <th>學號<th/>
	          <th>商品名稱<th/>
	          <th>數量<th/>
	          <th>金額<th/>
	          <th>取消<th/><tr/>
	    ";
	    $total="0";
while($row=mysqli_fetch_assoc($result)){
	$sum=$row["quantity"]*$row["price"];
	echo "<tr>";
	echo "<td>".$row["No"]."<td/>
	      <td>".$cookie."<td/>
	      <td>".$row["productName"]."<td/>
	      <td>".$row["quantity"]."<td/>
	      <td>".$row["price"]."<td/>
	      <td><a href='cartdelete.php?No=".$row["No"]."'>取消<a/><td/>";
	echo "<tr/>";
	$total=$total+$sum;
	$_SESSION["order"]= intval($row["productName"])+intval("*")+intval($row["quantity"]);
}
$date = strtotime("+7 days",time());
setcookie("total",$total,$date);
echo "<td>總金額:".$total."</td>";
echo "</table>";
echo "</div>"
?>
<button type="button" onclick="location.href='oinsert.php'" class="submit1">確認送出</button>
<button type="button" onclick="location.href='sdelete.php'" class="submit2">清除購物車</button>
<button type="button" onclick="location.href='shop.php'" class="submit">回訂購頁面</button>

</body>
</html>