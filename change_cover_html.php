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
  $target_dir = "./uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
      $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
                            if($check !== false) {
                                                    echo "File is an image - " . $check["mime"] . ".";
                                                                                  $uploadOk = 1;
                                                                                                                    } else {
                                                                                                                                                                  echo "File is not an image.";
                                                                                                                                                                                                                      $uploadOk = 0;
                                                                                                                                                                                                                                                                              }
                              }
// Check if file already exists
//if (file_exists($target_file)) {
//      echo "Sorry, file already exists.";
//          $uploadOk = 0;
//}
/*
   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 500000) {
         echo "Sorry, your file is too large.";
                   $uploadOk = 0;
                   }*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
} else {$target_file="./uploads/".$_SESSION["username"]."cover.png";
        $target_file_1=$target_file;
              if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                                echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
                                       try
                                            {
                                                       $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
                                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                         $params=array(":cover" => $target_file_1,":username"=>$_SESSION["username"]);
                                                                                  $result=$conn->prepare('update aniket_php_profiles set  cover=:cover where username=:username');
                                                                                           $result->execute($params);
                                                                                                    header("location:http://192.168.121.187:8001/php_assign/aniket/profile_php.php");
                                                                                                                      exit();
                                                                                                                          }
                                         catch(Exception $e)
                                               {
                                                       echo $e;
                                                           }
                                                } else {
                                                                                echo "Sorry, there was an error uploading your file";
                                                                                                              echo $target_file;
                                                                                                                                                }
                     }
header("location:http://192.168.121.187:8001/php_assign/aniket/change_cover_html.php");
         exit();
         } ?>



<!DOCTYPE html>
<html>
<head></head>
<body>
<form   action="http://192.168.121.187:8001/php_assign/aniket/change_cover_html.php" method="post" id ="form" enctype="multipart/form-data">
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


