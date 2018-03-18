<?php
echo var_dump($_REQUEST);

   try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":name" => $_REQUEST["name"],":username"=>$_REQUEST["uname"],":email"=>$_REQUEST["email"],":password"=>$_REQUEST["password"],":number"=>$_REQUEST["number"],":gender"=>$_REQUEST["gender"]);
         $result=$conn->prepare('insert into aniket_php_profiles values(:username,:password,:name,:number,:email,:gender,NULL,NULL)');
         $result->execute($params);
        $_SESSION["username"]=$_REQUEST["uname"];
        header("location:http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
        exit();
   }
  catch(Exception $e)
    {
      echo $e;
    }
header("location:http://192.168.121.187:8001/php_assign/aniket/signup_html.php");
        exit();

?>
