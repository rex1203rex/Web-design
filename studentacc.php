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
<link rel="stylesheet" type="text/css" href="studentacc.css">
<body class="body">

	
<span class="p1">
	學生帳號更改
</span>






<?php
echo "<table border='1' class='p'>";
echo "<tr>
      <th>姓名<th/>
      <th>學號<th/>
      <th>密碼<th/>
      <th>刪除帳號<th/>
      <tr/>";

$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM student";
$result=mysqli_query($con,$SQL);

while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>".$row["Name"]."<td/>
	      <td>".$row["學號"]."<td/>
	      <td>".$row["密碼"]."<td/>
          <td><a href='saccdelete.php?No=".$row["No"]."'>刪除帳號<a/><td/>
	      <tr/>";
}
?>
<button type="button" onclick="location.href='admin.php'" class="submit">回首頁</button>

</body>
</html>