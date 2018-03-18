<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
echo var_dump($_REQUEST);
session_start();
   try
      {
                 $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
                          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                   $params=array(":password" => $_REQUEST["npassword"],":username"=>$_SESSION["username"]);
                                            $result=$conn->prepare('update aniket_php_profiles set password=:password where username=:username');
                                                     $result->execute($params);
                                                         }
  catch(Exception $e)
      {
              echo $e;
                  }
header("location:http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
         exit();
         } ?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form id="form" method="post" action="http://192.168.121.187:8001/php_assign/aniket/change_password_html.php"  onsubmit="return myFunction();" ><br>
new password :
<input type="password" id="npassword" name="npassword"><br>
re enter new password :
<input type="password" id="rnpassword"><br>
<div id="nomatch" style="visibility:hidden;color:red" >passwords do not match</div>
<button type="submit" form="form" value="Submit">Submit</button>
</form>

<script>
      a=0;
     function myFunction()
       {
          if(a==0)
            event.preventDefault();
          console.log("function called");
          var form=document.getElementById("form");
       }
        function compare(){
                                                                                                                console.log(document.getElementById("nomatch").visibility);
       if(document.getElementById("npassword").value!=document.getElementById("rnpassword").value)
                                                                                                                                                                                                                     {a=0;                                                                                                      document.getElementById("nomatch").style.visibility="visible";
                                                                                                               }else
                                                                                                                                                                                                                      { a=1;                                                                                                                                                                                                       document.getElementById("nomatch").style.visibility="hidden";
                                                                                                                                                                                                                      }}
         document.getElementById("npassword").addEventListener('change', function f(){compare();});         document.getElementById("rnpassword").addEventListener('change', function f(){compare();}); 
  </script>


</body>
</html>
