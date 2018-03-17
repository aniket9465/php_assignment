<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form id="form" method="post" action="http://192.168.121.187:8001/php_assign/aniket/change_password_php.php"  onsubmit="return myFunction();" ><br>
old password :
<input type="password" name="password"  onchange="myFunction()"><br>
new password :
<input type="password" id="npassword" name="npassword"><br>
re enter new password :
<input type="password" id="rnpassword"><br>
<div id="nomatch" style="visibility:hidden;color:red" >passwords do not match</div>
<button type="submit" form="form" value="Submit">Submit</button>
</form>

<script>
      a=0,b=0;
     function myFunction()
       {
          if(a==0||b==0)
            event.preventDefault();
          console.log("function called");
          var form=document.getElementById("form");
          var req=new XMLHttpRequest();
          req.open("POST","http://192.168.121.187:8001/php_assign/aniket/login_php.php",true);
          req.setRequestHeader("Content-Type","application/json");
          req.onload=function ()
          {
             var res=this.responseText;
             if(res=="username")
               alert("username does not exists");
             if(res=="password")
               alert("wrong old  password");
             if(res=="ok")
            { b=1;return true;  }
          }
          var json=JSON.stringify({'username' : '<?php session_start(); echo $_SESSION["username"]  ?>' , 'password' : form.password.value}); console.log(json);
          req.send(json);
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
