<?php
  $data = file_get_contents("php://input");
  $obj = json_decode($data, true);
  try
    {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $result = $conn->query("select password from aniket_php_profiles where username=\"".$obj["username"]."\";");
         $num_rows = $result->rowCount();
         if($num_rows==0)
           echo "username";
         else
         {
           foreach($conn->query("SELECT password FROM aniket_php_profiles where username=\"".$obj["username"]."\";") as $row)
           if($row['password']==$obj["password"])
             echo "ok";
           else
             echo "password";
         }
    }
  catch(Exception $e)
    {
      echo $e;
    }
?>
