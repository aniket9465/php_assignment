<?php
session_start();
 try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $result=$conn->prepare('select * from  aniket_php_posts');
         $result->execute();
         $result = $result -> fetchAll();
echo "<br>feeds : <br><hr><hr> ";
foreach( $result as $row ) {
    echo $row['username']." <br><br>";
    echo $row['post_content']."<br><br><br><hr><br>";
}
    }
  catch(Exception $e)
    {
      echo $e;
    }

?>

