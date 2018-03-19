<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if(isset($_COOKIE["remember_me"]))
if($_COOKIE["remember_me"]!="nocookie")
{
    $_SESSION["username"]=$_COOKIE["remember_me"];
}

 try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":username"=>$_SESSION["username"]);
         $result=$conn->prepare('select * from  aniket_php_profiles where username=:username');
         $result->execute($params);
         $result=($result->fetch());
         if(!$result['profile']){
           header("location: http://192.168.121.187:8001/php_assign/aniket/complete_profile_html.php");die();}
    }
  catch(Exception $e)
    {
      echo $e;
    }

?>
<html>
<head></head>
<body>
<div style="display : flex;flex-direction:column">
<p>
name : <?php echo htmlspecialchars($result["name"]);?>
</p>
<p>
username : <?php echo htmlspecialchars($result["username"]);?>
</p>
<p>
mobile number : <?php echo $result["mobile"];?>
</p>
<p>profile:</p>
<img src="<?php echo $result['profile']; ?>" width="30%"/>
<p>cover:</p>
<img src="<?php echo $result['cover'];?>" height="100%" />
</div>
<a href="./change_profile_html.php"><button> change profile picture</button></a>
<a href="./change_cover_html.php"><button> change cover picture </button></a>
<a href="./edit_profile_html.php"><button> edit profile</button></a>
<a href="./change_password_html.php"><button> change password</button></a>
<a href="./add_feed_html.php"><button>add feed</button></a>
<a href="./common_feed.php"><button> common feed </button></a>
<a href="./logout.php"><button>logout</button></a>
</body>
</html>
