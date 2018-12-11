<?php
session_start();
include("connect.php");
include("functions.php");
global $link;
$username=$_SESSION['user'];
global $username;

$query10="SELECT * FROM USER WHERE USER_ID='".$username."';";
$result10=mysqli_query($link,$query10);
$row10=mysqli_fetch_assoc($result10);

$query="SELECT BIO_IMG FROM USER where USER_ID='$username'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
global $row;
$query2="SELECT BIO FROM USER WHERE USER_ID='$username'";
$result2=mysqli_query($link,$query2);
$row2=mysqli_fetch_array($result2);

$query3="SELECT FOLLOWER_ID FROM FOLLOWER where USER_ID='$username'"." AND STATUS='N';";
$result3=mysqli_query($link,$query3);
$var=mysqli_num_rows($result3);

$query4="SELECT FOLLOWER_ID FROM FOLLOWER where USER_ID='$username'"." AND STATUS='B';";
$result4=mysqli_query($link,$query4);
$var2=mysqli_num_rows($result4);


$query6="SELECT * FROM TWEETS where USER_ID='$username' ORDER BY DATE_TIME DESC LIMIT 3";
$result6=mysqli_query($link,$query6);
$var3=mysqli_num_rows($result6);
$row4=mysqli_fetch_assoc($result6);
if($var3==0)
{
$row4['IMG']="images/Welcome.jpg";
$row4['CONTENT']="Welcome to the world of Zion.Discover The world Beyond";
$row4['DATE_TIME']="now";
}
$query7="SELECT FOLLOWER_ID FROM FOLLOWER WHERE USER_ID='$username';";
$result7=mysqli_query($link,$query7);
$var4=mysqli_num_rows($result7);
$row5=mysqli_fetch_assoc($result7);
$query8="SELECT * FROM TWEETS where USER_ID='".$row5['FOLLOWER_ID']."';";
$result8=mysqli_query($link,$query8);
$var5=mysqli_num_rows($result8);
$row6=mysqli_fetch_assoc($result8);
if($var5==0)
{
$row6['IMG']="images/welcome2.jpg";
$row6['CONTENT']="Post Tweets about anything and Everything.We do not judge";
$row6['DATE_TIME']="now";
$row8['BIO_IMG']="images/brand";
}

$query9="SELECT NAME FROM USER WHERE USER_ID='".$row5['FOLLOWER_ID']."';";
$result9=mysqli_query($link,$query9);
$var6=mysqli_num_rows($result9);
$row7=mysqli_fetch_assoc($result9);

$query10="SELECT BIO_IMG FROM USER where USER_ID='".$row5['FOLLOWER_ID']."';";
$result10=mysqli_query($link,$query10);
$row8=mysqli_fetch_assoc($result10);

if($var6==0)
{
  $row7['NAME']="Zion";
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
    <meta name="author" content="Tushar Singh">
    <title>
      
        Zion &middot; 
      
    </title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets/css/toolkit.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>

  </head>


<body class="with-top-navbar">
  
<div class="growl" id="app-growl"></div>

<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img src="assets/img/brand-white.png" alt="brand">
      </a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapse-main">

        <ul class="nav navbar-nav hidden-xs">
          <li class="active">
            <a href="http://newproject2-com.stackstaging.com/profile.php">Home</a>
          </li>
          <li>
            <a href="http://newproject2-com.stackstaging.com/notifications.php">Profile</a>
          </li>
          <li>
            <a data-toggle="modal" href="#msgModal">Messages</a>
          </li>
          
        </ul>

        <ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
          <li >
            <a class="app-notifications" href="http://newproject2-com.stackstaging.com/notifications.php">
              <span class="icon icon-bell"></span>
            </a>
          </li>
          <li>
            <button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
              <img class="img-circle" src="<?php echo $row[0]; ?>">
            </button>
          </li>
        </ul>

        <form class="navbar-form navbar-right app-search" role="search" action="search.php" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" data-action="grow" name="search" placeholder="Search">
          </div>
        </form>

        <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
          <li><a href="http://newproject2-com.stackstaging.com/profile.php">Home</a></li>
          <li><a href="http://newproject2-com.stackstaging.com/notifications.php">Profile</a></li>
          <li><a href="http://newproject2-com.stackstaging.com/notifications.php">Notifications</a></li>
          <li><a data-toggle="modal" href="#msgModal">Messages</a></li>
          <li><a href="#" data-action="growl">Growl</a></li>
          <li><a href="http://newproject2-com.stackstaging.com/index.php">Logout</a></li>
        </ul>

        <ul class="nav navbar-nav hidden">
          <li><a href="#" data-action="growl">Growl</a></li>
          <li><a href="http://newproject2-com.stackstaging.com/index.php">Logout</a></li>
        </ul>
      </div>
  </div>
</nav>



<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Users</h4>
      </div>

      <div class="modal-body p-a-0">
        <div class="modal-body-scroller">
          <ul class="media-list media-list-users list-group">
            <li class="list-group-item">
              <div class="media">
                <a class="media-left" href="#">
                  <img class="media-object img-circle" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="media-body">
                  <button class="btn btn-default btn-sm pull-right">
                    <span class="glyphicon glyphicon-user"></span> Follow
                  </button>
                  <strong>Jacob Thornton</strong>
                  <p>@fat - San Francisco</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <a class="media-left" href="#">
                  <img class="media-object img-circle" src="assets/img/avatar-dhg.png">
                </a>
                <div class="media-body">
                  <button class="btn btn-primary btn-sm pull-right">
                    <span class="glyphicon glyphicon-user"></span> Follow
                  </button>
                  <strong>Dave Gamache</strong>
                  <p>@dhg - Palo Alto</p>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <a class="media-left" href="#">
                  <img class="media-object img-circle" src="assets/img/avatar-mdo.png">
                </a>
                <div class="media-body">
                  <button class="btn btn-primary btn-sm pull-right">
                    <span class="glyphicon glyphicon-user "></span> Follow
                  </button>
                  <strong>Mark Otto</strong>
                  <p>@mdo - San Francisco</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container p-t-md">
  <div class="row">
    <div class="col-md-4">
      
      

       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
           <form class="navbar-form navbar-right app-search" role="search"  method="POST">
          <div class="form-group">
            <input type="text" class="form-control" data-action="grow" name="search" placeholder="Search Users">
          </div>
        </form>
          </div>
          
          
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <ul class="list-group media-list media-list-stream">
        
       </ul>
      	 <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h3 class="m-a-0">Message Recipients</h3>
        </li>

        <li class="list-group-item media p-a">
          <?php if(!empty($_POST)){displayTweets2('messageusers',$_POST['search']);}?>
        </li>	
      </ul>
    </div>
  </div>




    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script type="text/javascript">
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
      
       $('.toggleFollow').click(function(e) {
        alert($(this).attr("data-userId"));
         var x=$(this).attr("data-userId");
         $.post('follow.php', { follow: x }, function(result) { 
   			alert(result); 
		});
    });  
      
      $('.like').click(function(e) {
        alert($(this).attr("data-tweet"));
         var x=$(this).attr("data-tweet");
         $.post('like.php', { follow: x }, function(result) { 
   			alert(result); 
		});
    });
      $('.delete').click(function(e) {
        alert($(this).attr("data-tweet"));
         var x=$(this).attr("data-tweet");
         $.post('delete.php', { follow: x }, function(result) { 
   			alert(result); 
		});
    });
    </script>
  </body>
</html>

