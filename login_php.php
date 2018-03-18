<?php
  session_start();
  $data = file_get_contents("php://input");
  $obj = json_decode($data, true);
  try
    {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":username" => $_REQUEST["username"]);
         $result=$conn->prepare('select * from aniket_php_profiles where username= :username');
         $result->execute($params);
         $num_rows = $result->rowCount();
         $params1=array(":username" => $_REQUEST["username"],":password"=>$_REQUEST["password"]);
         $result1=$conn->prepare('select * from aniket_php_profiles where username= :username and password = :password');
         $result1->execute($params1);
         $num_rows1=$result1->rowCount();
         if($num_rows==0)
         { header("Location: http://192.168.121.187:8001/php_assign/aniket/login_html.php");
                              die();
         }
         else
         {
           if($num_rows1==1)
           { echo "ok";$_SESSION["username"]=$_REQUEST["username"];
            header("Location: http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
                     die();
           }
           else
           { header("Location: http://192.168.121.187:8001/php_assign/aniket/login_php.php");
                                die();
           }
         }
    }
  catch(Exception $e)
    {
      echo $e;
    }
?>
