<!DOCTYPE html>
<html>
<head></head>
<body>
  <form   action="http://192.168.121.187:8001/php_assign/aniket/change_cover_php.php" method="post" id ="form" enctype="multipart/form-data">
    Select cover photo :
            <input type="file" accept="image/*" name="fileToUpload1"  id="fileToUpload1">
     <input type="submit" value="Upload Image"  name="submit">
  </form>
<script type="text/javascript">

window.onload = function() {
      document.getElementById("form").addEventListener("submit", function(e){
        check(e);
      });
}

function check(e) {
    var formData = new FormData();
    var file = document.getElementById("fileToUpload1").files[0];
    console.log("dc");
    formData.append("Filedata", file);
    try{
  var t = file.type.split('/').pop().toLowerCase();
    }
    catch(w){alert("add cover photo");return e.preventDefault(); }
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("fileToUpload1").value = '';
         e.preventDefault();return;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("fileToUpload1").value = '';
         e.preventDefault();return;
    }}
</script>
</body>
</html>


