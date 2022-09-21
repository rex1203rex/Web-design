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
<html><link rel="stylesheet" type="text/css" href="shop.css"/>
<body class="body">
<center>
<h1 class="h1">宿舍生活用品訂購系統</h1>
<button type="button" onclick="location.href='product.php'" class="w">商品瀏覽</button>
<button type="button" onclick="location.href='shoppingcart.php'" class="w1">查看購物車</button>
<button type="button" onclick="location.href='check.php'" class="w2">查詢訂單</button><br/>

    <form action="raddcart.php" method="POST">
	    <select name="product" class="select">
	      <option value="舒潔衛生紙">舒潔衛生紙<option/>
	      <option value="黑人牙膏">黑人牙膏<option/>
	      <option value="掃把組">掃把組<option/>
	      <option value="拖把組">拖把組<option/>
	      <option value="抹布">抹布<option/>
	      <option value="Persil洗衣精">Persil洗衣精<option/>
	      <option value="泡舒洗碗精">泡舒洗碗精<option/>
	      <option value="毛巾">毛巾<option/>
	      </select><td/>
	    <select name="quantity" class="select1">
	      <option value="1">1<option/>
	      <option value="2">2<option/>
	      <option value="3">3<option/>
	      <option value="4">4<option/>
	      <option value="5">5<option/>	
	      </select>
	      
 <input type='submit' value='加入購物車' class="submit">
 </form>
<button type="button" onclick="location.href='rlogout.php'" class="out">登出</button><br/>
</center></body>
</html>
