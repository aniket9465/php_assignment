<?php
echo var_dump($_REQUEST);
session_start();
   try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":name" => $_REQUEST["name"],":username"=>$_SESSION["username"],":email"=>$_REQUEST["email"],":number"=>$_REQUEST["number"],":gender"=>$_REQUEST["gender"]);
         $result=$conn->prepare('update aniket_php_profiles set name=:name,mobile=:number,email=:email,gender=:gender where username=:username');
         $result->execute($params);
    }
  catch(Exception $e)
    {
      echo $e;
    }

?>
