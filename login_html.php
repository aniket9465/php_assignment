<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_COOKIE["remember_me"]))
if($_COOKIE["remember_me"]!="nocookie")
{
  $_SESSION["username"]=$_COOKIE["remember_me"];
   header("Location: http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
                         die();
}

?>
<!DOCTYPE html>
<html>
<body>
    <form  id="form" method="post" action="http://192.168.121.187:8001/php_assign/aniket/login_php.php">
       Enter username: <input type="text" name="username">
       Enter password: <input type="password" name="password">
       Remember me <input type="checkbox" name="remember">
       <input type="submit" value="Submit">
    </form>
</body>
</html>
