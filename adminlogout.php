<?php
session_start();

session_destroy();

header('location:rlogin.php');

?>