<?php
session_start();
if(isset($_COOKIE["remember_me"]))
{
  setcookie("remember_me","nocookie", time() + (86400 * 30), "/","192.168.121.187"); 
  $_SESSION["username"]="";
}
header("location: http://192.168.121.187:8001/php_assign/aniket/index.php");
die();
?>
