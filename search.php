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

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg">New message</button>
        <h4 class="modal-title">Messages</h4>
      </div>

      <div class="modal-body p-a-0 js-modalBody">
        <div class="modal-body-scroller">
          <div class="media-list media-list-users list-group js-msgGroup">
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                </span>
                <div class="media-body">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="media-body-secondary">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                </span>
                <div class="media-body">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                </span>
                <div class="media-body">
                  <strong>Dave Gamache</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                </span>
                <div class="media-body">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="media-body-secondary">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                </span>
                <div class="media-body">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                </span>
                <div class="media-body">
                  <strong>Dave Gamache</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                </span>
                <div class="media-body">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="media-body-secondary">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                </span>
                <div class="media-body">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="media">
                <span class="media-left">
                  <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                </span>
                <div class="media-body">
                  <strong>Dave Gamache</strong>
                  <div class="media-body-secondary">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="hide m-a js-conversation">
            <ul class="media-list media-list-conversation">
              <li class="media media-current-user m-b-md">
                <div class="media-body">
                  <div class="media-body-text">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <a class="media-right" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                </a>
              </li>

              <li class="media m-b-md">
                <a class="media-left" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="media-body">
                  <div class="media-body-text">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="media-body-text">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="media-body-text">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="media m-b-md">
                <a class="media-left" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                </a>
                <div class="media-body">
                  <div class="media-body-text">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="media-body-text">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="media media-current-user m-b-md">
                <div class="media-body">
                  <div class="media-body-text">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <a class="media-right" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
                </a>
              </li>

              <li class="media m-b-md">
                <a class="media-left" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-fat.jpg">
                </a>
                <div class="media-body">
                  <div class="media-body-text">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="media-body-text">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="media-body-text">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="media m-b">
                <a class="media-left" href="#">
                  <img class="img-circle media-object" src="assets/img/avatar-mdo.png">
                </a>
                <div class="media-body">
                  <div class="media-body-text">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="media-body-text">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="media-footer">
                    <small class="text-muted">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
    <div class="col-md-3">
      
      <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">About <small>· <a href="http://newproject2-com.stackstaging.com/edit.php">Edit</a></small></h5>
          <ul class="list-unstyled list-spaced">
            <li><span class="text-muted icon icon-calendar m-r"></span>Speaks <a><?php echo $row10['LANGUAGES'];?></a>
            <li><span class="text-muted icon icon-users m-r"></span>Became friends with <a href="#"><?php echo $row7['NAME'];?> </a>
            <li><span class="text-muted icon icon-github m-r"></span>Mail <a href="#"><?php echo $row10['EMAIL'];?></a>
            <li><span class="text-muted icon icon-home m-r"></span>Contact<a href="#"><?php echo $row10['CONTACT_NO'];?></a>
            <li><span class="text-muted icon icon-location-pin m-r"></span>From <a href="#">TamilNadu, India</a>
          </ul>
        </div>
      </div>

       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Photos <small>· <a href="#">Edit</a></small></h5>
          <div data-grid="images" data-target-height="150">
            
              <?php displaytweets('images');?>
              
          </div>
          
          <div class="panel panel-default panel-link-list">
        <div class="panel-body">
          © 2015 Zion

          <a href="#">About</a>
          <a href="#">Help</a>
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Cookies</a>
          <a href="#">Ads </a>

          <a href="#">info</a>
          <a href="#">Brand</a>
          <a href="#">Blog</a>
          <a href="#">Status</a>
          <a href="#">Apps</a>
          <a href="#">Jobs</a>
          <a href="#">Advertise</a>
        </div>
      </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <ul class="list-group media-list media-list-stream">
        
       </ul>
      	 <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h3 class="m-a-0">Search Results</h3>
        </li>

        <li class="list-group-item media p-a">
          <?php displayTweets2('searchtweets',$_POST['search']);?>
        </li>
      		
      </ul>
      
    </div>
       <div class="col-md-3">
      
      <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Search Results<small>· <a href="#">View All</a></small></h5>
          <?php displayTweets2('searchusers',$_POST['search']);?>
        </div>
        </div>
    </div>
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

