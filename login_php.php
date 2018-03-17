<?php
  session_start();
  $data = file_get_contents("php://input");
  $obj = json_decode($data, true);
  try
    {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":username" => $obj["username"]);
         $result=$conn->prepare('select * from aniket_php_profiles where username= :username');
         $result->execute($params);
         $num_rows = $result->rowCount();
         $params1=array(":username" => $obj["username"],":password"=>$obj["password"]);
         $result1=$conn->prepare('select * from aniket_php_profiles where username= :username and password = :password');
         $result1->execute($params1);
         $num_rows1=$result1->rowCount();
         if($num_rows==0)
           echo "username";
         else
         {
           if($num_rows1==1)
           { echo "ok";$_SESSION["username"]=$obj["username"];}
           else
             echo "password";
         }
    }
  catch(Exception $e)
    {
      echo $e;
    }
?>
