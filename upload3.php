<?php
session_start();
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]))
{
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
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      	$_SESSION['bioimg']="images/".$_FILES["fileToUpload"]["name"];
    } 
  else 
  {
        echo "Sorry, there was an error uploading your file.";
    }
}

include("connect.php");
$query="SELECT * from USER where USER_ID='".$_SESSION['user']."'";
$username2=$_SESSION['user'];
$tk=0;
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
$query2="SELECT USER_ID FROM USER";
$result2=mysqli_query($link,$query2);
$row2=mysqli_fetch_array($result2);

if(!empty($_POST))
{
    $name=$_POST['name'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];
  	$bioimg=$_SESSION['bioimg'];
  	$bio=$_POST['bio'];
  	$language=$_POST['language'];
  	
  		$query2="UPDATE `USER` SET NAME='".$name."',EMAIL='".$email."',DOB='".$DOB."',CONTACT_NO='".$contact."',BIO='".$bio."',BIO_IMG='".$bioimg."' WHERE USER_ID ='".$username2."';";
      $result2=mysqli_query($link,$query2);
      if($result2)
      {
        echo "Succeesfully Inserted";
        echo "<script> location.href='http://newproject2-com.stackstaging.com/profile.php',true;</script>";
      }
      else
      {
        echo "Unsuccessful";
      }
}