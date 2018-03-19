<?php

  session_start();
  if(isset($_COOKIE["remember_me"]))
    if($_COOKIE["remember_me"]!="nocookie")
    {
      $_SESSION["username"]=$_COOKIE["remember_me"];
       header("Location: http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
                             die();
    }

?>

<html>
<a href="http://192.168.121.187:8001/php_assign/aniket/login_html.php"><button>login</button></a>
<a href="http://192.168.121.187:8001/php_assign/aniket/signup_html.php"><button>signup</button></a>
</html>

