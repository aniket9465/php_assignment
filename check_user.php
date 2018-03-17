<?php
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
         if($num_rows==0)
           echo 1;
         else
         {
             echo 0;
          }
    }
  catch(Exception $e)
    {
      echo $e;
    }
?>

