<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_COOKIE["remember_me"]))
if($_COOKIE["remember_me"]!="nocookie")
{
        $_SESSION["username"]=$_COOKIE["remember_me"];
}
try{
    if($_SESSION["username"]=="")
        {header("location:http://192.168.121.187:8001/php_assign/aniket/index.php");
              die();}
}
catch(Exception $e){header("location:http://192.168.121.187:8001/php_assign/aniket/change_cover_html.php");
    die();
}

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
}
else
{}?>
<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
   <form method="post" onsubmit="return required();"  enctype="multipart/form-data"  action="http://192.168.121.187:8001/php_assign/aniket/add_feed_html.php" id="form"  >
     <div style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
     <p>Feed Content :</p>
     <textarea type="text" name="name" cols="40" rows="5"></textarea>
     <input type="submit" name="submit">
     </div>
<script>
function required()
{
var empt = document.forms["form"]["text1"].value;
if (empt == "")
{
event.preventDefault();
alert("Please input a Value");
return false;
}
else
{
alert('Code has accepted : you can try another');
return true;
}
}
</script>
</body>
</html>

