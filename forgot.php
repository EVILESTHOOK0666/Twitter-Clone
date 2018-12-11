<?php
include("connect.php");

if(!empty($_POST))
{
  if(!$_POST['email'] || !$_POST['username'] || !$_POST['password'])
  {
    echo "Invalid Input";
  }
  else
  {
  $query="SELECT EMAIL FROM USER where USER_ID='".$_POST['username']."';";
  $result=mysqli_query($link,$query);
  $row=mysqli_fetch_assoc($result);
  if($row['EMAIL']==$_POST['email'])
  {
    $pass=md5($_POST['password']).md5('pass');
    $query2="UPDATE USER SET PASSWORD='".$pass."' where USER_ID='".$_POST['username']."';";
    $result=mysqli_query($link,$query2);
    echo "password Changed";
    echo "<script> location.href='http://newproject2-com.stackstaging.com/index.php'; </script>";
  }
  else
  {
    echo "Inavlid Access";
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
      
        Change Password &middot; 
      
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
  
   


<div class="container-fluid container-fill-height">
  <div class="container-content-middle">
    <form role="form" id="form1" class="m-x-auto text-center app-login-form" method="post">

      <a href="../index.html" class="app-brand m-b-lg">
        <img src="../assets/img/brand.png" alt="brand">
      </a>

      <div class="form-group">
        <input class="form-control" name="username" placeholder=" Enter Username">
      </div>

      <div class="form-group m-b-md">
        <input type="email" class="form-control" name="email" placeholder="Enter Email">
      </div>
        <div class="form-group m-b-md">
        <input type="password" class="form-control" name="password" placeholder="Enter new password">
      	</div>
        
      <div class="m-b-lg">
        <button type="submit" form="form1"  id="log">Submit</button>
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
