<?php
session_start();
include("connect.php");
$query="SELECT * from USER where USER_ID='".$_SESSION['user']."'";
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
  	if (is_array($row2) || is_object($row2))
	{
  	foreach($row2 as $name2)
      {
        if($_POST['username']==$name2)
        {
          echo "Username already Taken";
          $tk=1;
          break;
        }
      }
    }
  	
      $query2="INSERT INTO USER VALUES('$username','$password','$gender','N','$language','$name','$bio','$bioimg','$email','$DOB',$contact);";
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
      
        Edit Info&middot; 
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
    <form role="form" id="form2" class="m-x-auto text-center app-login-form" method="post" action="upload3.php" enctype="multipart/form-data">
      <p></p>
      <p></p>
        <img src="../assets/img/brand.png" alt="brand" style="width:100px; height:40px;">
      <p></p>
      
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Language" value="<?php echo $row['LANGUAGES'];?>" name="language">
      </div>
        <div class="form-group">
        <input class="form-control" placeholder="Name" value="<?php echo $row['NAME'];?>" name="name">
      </div>
       <div class="form-group">
        <input  type="date" class="form-control" placeholder="DOB" value="<?php echo $row['DOB'];?>" name="DOB">
      </div>
       <div class="form-group">
        <input class="form-control" type="email" placeholder="Email" value="<?php echo $row['EMAIL'];?>" name="email">
      </div>
       <div class="form-group">
        <input class="form-control" placeholder="Phone No" value="<?php echo $row['CONTACT_NO'];?>"name="contact">
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Bio" value="<?php echo $row['BIO'];?>" name="bio">
      </div>
      <select name="gender">
  	<option value="M">M</option>
  	<option value="F">F</option>
	</select>
        <div class="form-group">
  			Select Bio img: <input type="file" name="fileToUpload">
		</div>
      <div class="m-b-lg">
        <button type="submit" form="form2" class="btn btn-primary" id="sign">Submit</button>
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
