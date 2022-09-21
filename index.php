<?php
session_start();

if(isset($_SESSION["login"]))
{
	if($_SESSION["login"]=="Yes"){
    header ('location:shop.php');
    }
}

?>


<html>
    <link rel="stylesheet" type="text/css" href="rlogin.css"/>
        <body class="body">
            <p class="title">宿舍生活用品訂購系統</p>
    <form action="rlogincheck.php" method="POST" class="form">
    <input type="text" name="studentNo" class="p" placeholder="學號"><br/>
    <input type="password" name="password" class="p" placeholder="密碼"><br/>
    <input type="submit" value="登入" class="submit">
    </form>
    </body>
</html>