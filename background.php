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
<link rel="stylesheet" type="text/css" href="background.css">
<body class="body">
<button type="button" onclick="location.href='admin.php'" class="w5">回首頁</button>

<?php
session_start();
$舒潔衛生紙="0";
$黑人牙膏="0";
$掃把組="0";
$拖把組="0";
$抹布="0";
$Persil洗衣精="0";
$泡舒洗碗精="0";
$毛巾="0";
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM analysis";
$result=mysqli_query($con,$SQL);
while( $row=mysqli_fetch_assoc($result)){
if($row["product"]=="舒潔衛生紙"){
	for($i=1;$i<=$row["quant"];$i++){
	$舒潔衛生紙++;
}}
if($row["product"]=="黑人牙膏"){
	for($i=1;$i<=$row["quant"];$i++){
	$黑人牙膏++;
}}
if($row["product"]=="掃把組"){
	for($i=1;$i<=$row["quant"];$i++){
	$掃把組++;
}}
if($row["product"]=="拖把組"){
	for($i=1;$i<=$row["quant"];$i++){
	$拖把組++;
}}
if($row["product"]=="抹布"){
	for($i=1;$i<=$row["quant"];$i++){
	$抹布++;
}}
if($row["product"]=="Persil洗衣精"){
	for($i=1;$i<=$row["quant"];$i++){
	$Persil洗衣精++;
}}
if($row["product"]=="泡舒洗碗精"){
	for($i=1;$i<=$row["quant"];$i++){
	$泡舒洗碗精++;
}}
if($row["product"]=="毛巾"){
	for($i=1;$i<=$row["quant"];$i++){
	$毛巾++;
}}

}
?>
<br/>
<p class="word">商品購買情形:</p>
<br/>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name', 'Quantity'],

          <?php

          echo "['舒潔衛生紙',".$舒潔衛生紙."],";            
          echo "['黑人牙膏',".$黑人牙膏."],";
          echo "['掃把組',".$掃把組."],";
          echo "['拖把組',".$拖把組."],";
          echo "['抹布',".$抹布."],";
          echo "['Persil洗衣精',".$Persil洗衣精."],";
          echo "['泡舒洗碗精',".$泡舒洗碗精."],";
          echo "['毛巾',".$毛巾."],";

          ?>
        ]);

        var options = {
          chart: {
            title: 'product analysis',
 
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<br/>
<p class="word">費用遲繳情形:</p>
<br/>
<?php
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT studentNo,paid FROM orderlist";
$result=mysqli_query($con,$SQL);
while( $row=mysqli_fetch_assoc($result))
{
  if($row["paid"]=="遲繳")
  {
    $No=$row["studentNo"];
    if(!isset($_SESSION["$No"]))
    {
      $_SESSION["$No"]=1;
    }
    else
    {
      $_SESSION["$No"]++;
       if($_SESSION["$No"]==3)
      {
      echo "<span class='b'>";
      echo $No;
      echo "</span>";
      echo "</br>";
      }
    }
  }
}

?>

<br/>
<?php
$times="0";
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT * FROM analysis";
$result=mysqli_query($con,$SQL);
while( $row=mysqli_fetch_assoc($result)){
	if($row["orders"]=='1'){$times++;}
}
echo "<span class='word'>";
echo "平台總使用次數:".$times; 
echo "</span>";

?>


</body></html>