<?php
echo var_dump($_REQUEST);
session_start();
   try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":password" => $_REQUEST["npassword"],":username"=>$_SESSION["username"]);
         $result=$conn->prepare('update aniket_php_profiles set password=:password where username=:username');
         $result->execute($params);
    }
  catch(Exception $e)
    {
      echo $e;
    }
header("location:http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
         exit();

?>

