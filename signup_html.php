<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
   <form method="post"  enctype="multipart/form-data"  action="http://192.168.121.187:8001/php_assign/aniket/signup_php.php" id="form" onsubmit="return validateForm()" >
     <div style="display: flex;flex-direction: column;align-items: center;justify-content: center;">
     <p>Name :
     <input type="text" name="name">
     </p>
     <p>User name :
     <input type="uname" id="uname" name="uname">
     <div style="color: red;visibility: hidden" id="uname1">
      username used.
     </div>
     </p>
     <p>
     Email :
        <input type="email" id="email" name="email">
          <div style="color: red;visibility: hidden" id="nomail">
          Enter a valid email
          </div>
     </p>
     <p>Phone number :
     <input type="text" name="number" id="number" pattern="[0-9]{10}">
     <div style="color: red;visibility: hidden" id="nonumber">
     Enter a valid phone number
     </div>
                                                                                                          </p>
                                                                                                          <p>Gender :
     <input type="radio" name="gender" value="1">
     Male
     <input type="radio" name="gender" value="1">
     Female
                                                                                                           </p>

                                                                                                           <p>Password :
                                                                                                           <input type="password" name="password" id="pass" >
                                                                                                           </p>
                                                                                                           <p>Re_Password :
      <input type="password" name="Re_Password" id="repass"> 
      <div style="color: red;visibility: hidden" id="nomatch">
      Password and Re_Password should match
      </div>
       <input type="submit" name="submit">
       </div>
       </form>
       <script>
       var a=0,b=0;
       function validateForm() {
             var x = document.forms["form"]["name"].value;
                 if (x == "") {
                           alert("Name must be filled out");
                                   return false;
                                       }
                 var x = document.forms["form"]["gender"].value;
                                  if (x == "") {
                                       alert("gender must be filled out");
                                            return false;
                                                                                                                                         }
                 var x = document.forms["form"]["number"].value;
                 if (x == "") {
                             alert("Number must be filled out");
                                      return false;
                                                                     }
                 var x = document.forms["form"]["email"].value;
                                  if (x == "") {
                              alert("email must be filled out");
                                 return false;
                                                                                                                                         }
                 var x = document.forms["form"]["uname"].value;
                 if (x == "") {
                             alert("username must be filled out");
                                     return false;}
                  var x = document.forms["form"]["pass"].value;
                                  if (x == "") {
                                        alert("password must be filled out");
                                           return false;
                                                                                                                                      }

       if(a==0||b==0)return false;
       return true;
       }
                                                                                                               function compare(){
                                                                                                                console.log(document.getElementById("nomatch").visibility);
                                                                                                                                                                                                                     if(document.getElementById("pass").value!=document.getElementById("repass").value)
                                                                                                                                                                                                                     {a=0;                                                                                                      document.getElementById("nomatch").style.visibility="visible";
                                                                                                               }else
                                                                                                                                                                                                                      { a=1;                                                                                                                                                                                                       document.getElementById("nomatch").style.visibility="hidden";
                                                                                                                                                                                                                      }}
            function compare1(){
              if(!RegExp(/^(\+91|0){0,1}[987]{1}[0-9]{9}$/).test(document.getElementById("number").value))
              { document.getElementById("nonumber").style.visibility="visible";a=0;}
              else
              {document.getElementById("nonumber").style.visibility="hidden";a=1;}
            }
           function compare2(){
            if(!RegExp("^.+@.+\.[A-Za-z]+$").test(document.getElementById("email").value))
            {document.getElementById("nomail").style.visibility="visible";a=0;}
            else
            {document.getElementById("nomail").style.visibility="hidden";a=1;}
            }
             document.getElementById("pass").addEventListener('change', function f(){compare();});
             document.getElementById("repass").addEventListener('change', function f(){compare();});
             document.getElementById("number").addEventListener('change', function f(){compare1();});
             document.getElementById("email").addEventListener('change', function f(){compare2();});
             document.getElementById("uname").addEventListener('change', function f(){myFunction();});
            function myFunction()
       {
          console.log("function called");
          event.preventDefault();
          var form=document.getElementById("form");
          var req=new XMLHttpRequest();
          req.open("POST","http://192.168.121.187:8001/php_assign/aniket/check_user.php",true);
          req.setRequestHeader("Content-Type","application/json");
          req.onload=function ()
          {
             var res=this.responseText;
             if(res==0)
             { b=0;document.getElementById("uname1").style.visibility="visible";}
             else
             {b=1;document.getElementById("uname1").style.visibility="hidden";}
             console.log(res);
           }
          var json=JSON.stringify({'username' : form.uname.value , 'password' : form.pass.value}); console.log(json);
          req.send(json);
       }


</script>
  </body>
</html>

