<?php
session_start();
include("connect.php");
$query="SELECT USER_ID from USER";
$tk=0;

if(!empty($_POST))
{

if($result=mysqli_query($link,$query))
{
  $row=mysqli_fetch_array($result);
}

  $username=$_POST['username'];
  $password=$_POST['password'];
  $password=md5($password).md5('pass');
    $name=$_POST['name'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];
  	$bioimg=$_SESSION['bioimg'];
  	if (is_array($row) || is_object($row))
	{
  	foreach($row as $name2)
      {
        if($_POST['username']==$name2)
        {
          echo "Username already Taken";
          $tk=1;
          break;
        }
      }
    }
  echo $username;
      $query2="INSERT INTO USER VALUES('$username','$password','$gender','N','English','$name','Hi there,I am using Zion','$bioimg','$email','$DOB',$contact);";
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

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Signup &middot; 
      
    </title>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="../assets/css/toolkit.css" rel="stylesheet">
    
    <link href="../assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
        
      }
        .form{
            margin:auto;
        }
    </style>

  </head>
<body>
  


<div class="container-fluid container-fill-height" id="one" style="overflow-y: scroll;">
  <div class="container-content-middle">
    <form role="form" id="form2" class="m-x-auto text-center app-login-form" method="post" action="upload.php" enctype="multipart/form-data">
      <p></p>
      <p></p>
        <img src="../assets/img/brand.png" alt="brand" style="width:100px; height:40px;">
      <p></p>
      <div class="form-group">
        <input class="form-control" placeholder="Username" name="username">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
        <div class="form-group">
        <input class="form-control" placeholder="Name" name="name">
      </div>
       <div class="form-group">
        <input  type="date" class="form-control" placeholder="DOB" name="DOB">
      </div>
       <div class="form-group">
        <input class="form-control" type="email" placeholder="Email" name="email">
      </div>
       <div class="form-group">
        <input class="form-control" placeholder="Phone No" name="contact">
      </div>
      <select name="gender">
  	<option value="M">M</option>
  	<option value="F">F</option>
	</select>
        <div class="form-group">
  			Select Bio img: <input type="file" name="fileToUpload">
		</div>
      <div class="m-b-lg">
        <button type="submit" form="form2" class="btn btn-primary" id="sign">Sign Up</button>
        <button class="btn btn-default" id="log"><a href="http://newproject2-com.stackstaging.com/index.php">Log in</a></button>
      </div>
        
    </form>
  </div>
</div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
    </script>
  </body>
</html>
