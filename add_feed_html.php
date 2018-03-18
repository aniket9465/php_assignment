<!DOCTYPE html>
<html>
 <head>
 </head>
 <body>
   <form method="post" onsubmit="return required();"  enctype="multipart/form-data"  action="http://192.168.121.187:8001/php_assign/aniket/add_feed_php.php" id="form"  >
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
