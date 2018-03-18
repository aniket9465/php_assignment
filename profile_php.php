<?php
session_start();
 try
   {
         $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $params=array(":username"=>$_SESSION["username"]);
         $result=$conn->prepare('select * from  aniket_php_profiles where username=:username');
         $result->execute($params);
         $result=($result->fetch());
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
<img src="<?php echo $result['profile']; ?>"  />
<p>cover:</p>
<img src="<?php echo $result['cover'];?>"  />
</div>
<a href="./change_profile_html.php"><button> change profile picture</button></a>
<a href="./change_cover_html.php"><button> change cover picture </button></a>
<a href="./edit_profile_html.php"><button> edit profile</button></a>
<a href="./change_password_html.php"><button> change password</button></a>
<a href="./add_feed_html.php"><button>add feed</button></a>
<a href="./common_feed.php"><button> common feed </button></a>
</body>
</html>
