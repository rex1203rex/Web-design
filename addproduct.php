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
<link rel="stylesheet" type="text/css" href="addproduct.css"/>
<body class="body">

<p class="p">加入商品系統</p>
<form action="uploadproduct.php" method="POST" >
<input type="text" name="name" class="p1" placeholder="商品名稱"><br/>
<input type="text" name="price" class="p2" placeholder="商品價格"><br/>

<span class="pic">
<input type="file" name="photo"  placeholder="商品圖片"><br/>
</span>

<input type="text" name="quantity" class="q" placeholder="存貨數量"><br/>
<input type="text" name="intro" class="i" placeholder="介紹"><br/>
<input type="submit" value="送出" class="submit">
<button type="button" onclick="location.href='admin.php'" class="button">回首頁</button>
</form>
</body>
</html>