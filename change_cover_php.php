<?php
session_start();
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


?>
