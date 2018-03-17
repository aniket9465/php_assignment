<?php
  session_start();
  function console($mess)
  {
    print_r($_SESSION);
    echo "<script>var a=console.log(\"$mess\")</script>";
  }
  console("abc");
  /*echo $_POST["mess"];
  try
  {
    $conn=new PDO("mysql:host=192.168.121.187;dbname=first_year_db","first_year","first_year");
    echo "<script>alert(\"connected successfully\");</script>";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach($conn->query('SELECT * FROM aniket') as $row) {
          echo $row['name']; //etc...
    }
    $result = $conn->query("select * from aniket;");
    $num_rows = $result->rowCount();
    var_dump($num_rows);
  }
  catch(Exception $e)
  {
    echo $e;
  }*/
  $target_dir = "./uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    console(var_dump($_POST));
    console($_POST["txt"]);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                              $uploadOk = 1;
                                  } else {
                                            echo "File is not an image.";
                                                    $uploadOk = 0;
                                                        }
  }
// Check if file already exists
if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
          $uploadOk = 0;
}
$_SESSION["favcolor"] = "green";
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
} else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                              echo "Sorry, there was an error uploading your file";
                              echo $target_file;
                                  }
var_dump($_SESSION["favanimal"]);
}
?>
<html>
<head></head>
<body>
<!--1
<br>
<script>
  var http=new XMLHttpRequest();
  var url="http://192.168.121.187:8001/php_assign/aniket/index.php";
  var params="mess=post request successfull";
  http.open("POST",url,true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
                  alert("request complete");
                      }
  }
  http.send(params);
</script>-->
<form action="http://192.168.121.187:8001/php_assign/aniket/index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="txt"/>
            <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
