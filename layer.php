<?php
session_start();

if(isset($_SESSION["Llogin"]))
{
	if($_SESSION["Llogin"]=="No"){
    header ('location:index.php');
    }
}
else{
	header ('location:index.php');
}
?>
<html>
<link rel="stylesheet" type="text/css" href="layer.css">
<body class="body">


<span class="p1">
	樓層訂單
</span>
<?php
echo "<table border='1' class='p'>";
echo "<tr>
      <th>學號<th/>
      <th>姓名<th/>
      <th>房號<th/>
      <th>訂購日期<th/>
      <th>價格<th/>
      <th>繳費情況<th/>
      <tr/>";

$cookie=$_COOKIE["LLoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM layer WHERE 帳號='$cookie'";
$result1=mysqli_query($con,$SQL);
while($row=mysqli_fetch_assoc($result1)){
	$floor=$row["樓層"];
}
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL1="SELECT * FROM orderlist WHERE 樓層='$floor'";
$result=mysqli_query($con,$SQL1);

while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>".$row["studentNo"]."<td/>
	      <td>".$row["Name"]."<td/>
	      <td>".$row["房號"]."<td/>
	      <td>".$row["dates"]."<td/>
	      <td>".$row["price"]."<td/>
	      <td>".$row["paid"]."<td/>
	      <tr/>";
}
?>
<button type="button" onclick="location.href='Llogout.php'" class="submit" >登出</button>

</body>
</html>