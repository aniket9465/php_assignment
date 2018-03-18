<?php
echo var_dump($_REQUEST);
session_start();
   try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":post" => $_REQUEST["name"],":username"=>$_SESSION["username"]);
         $result=$conn->prepare('insert into aniket_php_posts(username,post_content) values(:username,:post)');
         $result->execute($params);
    }
  catch(Exception $e)
    {
      echo $e;
    }
header("location: http://192.168.121.187:8001/php_assign/aniket/common_feed.php");
exit();
?>

