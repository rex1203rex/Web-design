<?php
$cookie=$_COOKIE["LoginName"];
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL="SELECT Name FROM student WHERE 學號='$cookie'";
$result=mysqli_query($con,$SQL);
while($row=mysqli_fetch_assoc($result)){
$Name=$row["Name"];
}
$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL1="SELECT productquantity,dates,price FROM orderlist WHERE studentNo='$cookie' AND No=(SELECT MAX(No) FROM orderlist)";
$result=mysqli_query($con,$SQL1);
while($row=mysqli_fetch_assoc($result)){
$order=$row["productquantity"];
$dates=$row["dates"];
$price=$row["price"];
}
$_SESSION["mail"]="Yes";
$subject=$cookie."同學，訂單送出成功";
$message1=$Name."同學你好，您於".$dates."訂購的".$order."總共".$price."元，請於五天內至學二辦公室進行繳費，謝謝配合";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail=new PHPMailer();

if(isset($_SESSION["mail"])){
	$message=$message1;
	$message=nl2br($message);
	$mail=new PHPMailer;
    $mail->SMTPDebug = 2;                    
    $mail->isSMTP();                                          
    $mail->Host       = 'smtp.gmail.com';                  
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'homerhung1026@gmail.com';                    
    $mail->Password   = 'homer.123';                           
    $mail->SMTPSecure = "ssl";         

    $mail->Port       = 465;                                  
    $mail->CharSet="UTF-8";
    $mail->Encoding="base64";

    $mail->setFrom('homerhung1026@gmail.com', 'Ian');
        $mail->isHTML(true);                                  
    $mail->Subject = "=?utf-8?B?" . base64_encode("$subject") . "?=";


$con=mysqli_connect('localhost','id14040238_rex','C6uP*//I2&L6B3=w','id14040238_report');
$SQL2="SELECT * FROM student WHERE 學號='$cookie'";
$result=mysqli_query($con,$SQL2);
while( $row=mysqli_fetch_assoc($result) )
{
	$mail->addAddress($row['email']);
	$massage="你好".$row['Name']."同學<br/>".$message1;
	$mail->Body = $message;

    if($mail->send()){
         header('location:shop.php');
    }
    else{
    	echo 'failed';
    }
   }
}
?>