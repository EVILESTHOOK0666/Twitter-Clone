<?php
session_start();
include("connect.php");

if (!empty($_POST)) 
{
  	if(!$_POST['username'] || !$_POST['password'])
  	{
    	echo "Haha Very Funny Punk";
    }
     else
     {
  		$query="SELECT USER_ID FROM USER WHERE USER_ID='".$_POST['username']."';";
  		$result=mysqli_query($link,$query);
       	$row=mysqli_fetch_assoc($result); 
        if(mysqli_num_rows($result)>0)
        {
          $link=mysqli_connect("shareddb1e.hosting.stackcp.net","TWITTERDB2-363720d4","qwerty12","TWITTERDB2-363720d4");
          $query2="SELECT `PASSWORD` FROM `USER` WHERE `USER_ID` ='".mysqli_real_escape_string($link,$_POST['username'])."';";
          $result2=mysqli_query($link,$query2);
		  $row2=mysqli_fetch_array($result2);
          $pa=$_POST['password'];
          $pa=md5($pa).md5('pass');
           foreach($row2 as $pass)
           {
             
           if($pa==$pass)
           {
           		echo "Login Successful";
             	$_SESSION['user']=$_POST['username'];
             	echo "<script> location.href='http://newproject2-com.stackstaging.com/profile.php'; </script>";
          	}
             else
       		{
         		echo "Invalid Username/Password";
       		}
            }
        }
       else
       {
         echo "<script> alert('Invalid Username/Password');</script>";
       }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Zion &middot; 
      
    </title>
<link rel="shortcut icon" href="images/brand.ico" type="image/ico" >
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
      .jumbotron{
        background-image: url(images/background.jpg);
        background-size:100% auto;
        color:#ECF0F1;
      }
      #header.header-front-page {
		background-size: cover !important;
		}
    </style>

  </head>


<body>
  <div class="col-md-2">
  </div>
  <div class="col-md-8 container-content-middle">
<div class="jumbotron jumbotron-fluid">
  <h1 class="display-4 one">Welcome to Zion!</h1>
  <p class="lead">    A site designed to meet your Social Needs.</p>
  </div>
  </div>
<div class="container-fluid">
  <div class="container-content-middle">    
    <form role="form" id="form1" class="m-x-auto text-center app-login-form" method="post">
		<a href="../index.html" class="app-brand m-b-lg">
        <img src="../assets/img/brand.png" alt="brand">
      </a>
      
      <div class="form-group">
        <input class="form-control" name="username" placeholder="Username">
      </div>

      <div class="form-group m-b-md">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
        
        
      <div class="m-b-lg">
        <button type="submit" form="form1" class="btn btn-primary" id="log">Log In</button>
        <button class="btn btn-default" id="sign"><a href="http://newproject2-com.stackstaging.com/register.php">Sign up</a></button>
      </div>
        <div class="screen-login">
        <a href="http://newproject2-com.stackstaging.com/forgot.php" class="text-muted">Forgot password</a>
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
     	function newLocation() 
    	{
    	window.location="http://tusharwebpage3-com.stackstaging.com/site2.php";
    	}
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      });
     
    </script>
  </body>
</html>

