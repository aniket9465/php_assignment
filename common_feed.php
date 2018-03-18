<?php
session_start();
 try
   {
         echo '<a href="http://192.168.121.187:8001/php_assign/aniket/profile_php.php"><button>profile page</button></a><br><br>';
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $result=$conn->prepare('select * from  aniket_php_posts');
         $result->execute();
         $result = $result -> fetchAll();
echo "<br>feeds : <br><hr><hr> ";
foreach( $result as $row ) {
    echo htmlspecialchars($row['username']);
    echo "<br><br>";
    echo htmlspecialchars($row['post_content']);
    echo "<br><br><br><hr><br>";
    }
    }
  catch(Exception $e)
    {
      echo $e;
    }

?>

