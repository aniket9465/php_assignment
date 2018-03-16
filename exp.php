<DOCTYPE html>
<html>
<body>
    <form  id="form" onsubmit="myFunction()">
       Enter username: <input type="text" name="name">
       Enter password: <input type="text" name="pass">
       <input type="submit" value="Submit">
    </form>

  <script>
     function myFunction()
       {
          console.log("function called");
          event.preventDefault();
          var form=document.getElementById("form");
          var req=new XMLHttpRequest();
          req.open("POST","http://192.168.121.187:8001/php_assign/aniket/login.php",true);
          req.setRequestHeader("Content-Type","application/json");
          req.onload=function ()
          {
             var res=this.responseText;
             alert(res);
             if(res=="username")
               alert("username does not exists");
             if(res=="password")
               alert("wrong password");
             if(res=="ok")
               alert("successfull login");
          }
          var json=JSON.stringify({'username' : form.name.value , 'password' : form.pass.value}); console.log(json);
          req.send(json);
       }
  </script>

</body>
</html>
