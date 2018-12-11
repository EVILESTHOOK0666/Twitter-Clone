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

if (!empty($_POST)) 
{
  if(!$_POST['tweet'])
  {
  }
  else
  {
  include("upload2.php");
  $tweet=$_POST['tweet'];
  $img=$timg;
  $date = date('Y-m-d H:i:s');
  $tweetno=rand(10000,100000);
  $query5="INSERT INTO TWEETS VALUES('$tweetno','$username','$tweet','$img','$date');";
  $result5=mysqli_query($link,$query5);
  if($result5)
  {
  	echo "tweet inserted";
  }
  else
  {
  echo "error occured";
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
    <meta name="author" content="Tushar Singh">
	<link rel="shortcut icon" href="images/brand.ico" />
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Cookie Policy</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4><p>This website uses cookies and stores your private information on your computer ready to be stolen</p>
        If you can't sleep at night read our Cookie policy <a href="http://newproject2-com.stackstaging.com/cookie.php">here</a></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
      <a class="navbar-brand" href="#">
        <img src="assets/img/brand-white.png" alt="brand">
      </a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapse-main">

        <ul class="nav navbar-nav hidden-xs">
          <li class="active">
            <a href="#">Home</a>
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
          <li><a href="#">Home</a></li>
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

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="btn btn-sm btn-info pull-right app-new-msg js-newMsg"><a href="http://newproject2-com.stackstaging.com/message.php">New message</a></button>
        <h4 class="modal-title">Messages</h4>
      </div>

      <div class="modal-body p-a-0 js-modalBody">
        <div class="modal-body-scroller">
          <div class="media-list media-list-users list-group js-msgGroup">
           <?php displaytweets('message');?> 
            
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
      <div class="panel panel-default panel-profile m-b-md">
        <div class="panel-heading" style="background-image: url(assets/img/iceland.jpg);"></div>
        <div class="panel-body text-center">
          <a href="#">
            <img class="panel-profile-img" src="<?php echo $row[0];?>" >
          </a>

          <h5 class="panel-title">
            <a class="text-inherit" href="#"> <?php echo $username ?> </a>
          </h5>

          <p class="m-b-md"><?php echo $row2[0]; ?> </p>

          <ul class="panel-menu">
            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                Friends
                <h5 class="m-y-0"><?php echo $var;?> </h5>
              </a>
            </li>

            <li class="panel-menu-item">
              <a href="#userModal" class="text-inherit" data-toggle="modal">
                Enemies
                <h5 class="m-y-0"><?php echo $var2; ?> </h5>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">About <small>· <a href="http://newproject2-com.stackstaging.com/edit.php">Edit</a></small></h5>
          <ul class="list-unstyled list-spaced">
            <li><span class="text-muted icon icon-calendar m-r"></span>Speaks <a><?php echo $row10['LANGUAGES'];?></a>
            <li><span class="text-muted icon icon-users m-r"></span>Became friends with <a href="#"><?php echo $row7['NAME'];?> </a>
            <li><span class="text-muted icon icon-github m-r"></span>Mail <a href="#"><?php echo $row10['EMAIL'];?></a>
            <li><span class="text-muted icon icon-home m-r"></span>Contact <a href="#"><?php echo $row10['CONTACT_NO'];?></a>
            <li><span class="text-muted icon icon-location-pin m-r"></span>From <a href="#">TamilNadu, India</a>
          </ul>
        </div>
      </div>

       <div class="panel panel-default visible-md-block visible-lg-block">
        <div class="panel-body">
          <h5 class="m-t-0">Photos <small>· <a href="http://newproject2-com.stackstaging.com/notifications.php">Edit</a></small></h5>
          <div data-grid="images" data-target-height="150">
              <?php displaytweets('images');?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <ul class="list-group media-list media-list-stream">
		<form method="post" id="form1" enctype="multipart/form-data" >
        <li class="media list-group-item p-a">
          <div class="input-group">
            <input type="textbox" class="form-control" placeholder="Tweet" name="tweet">
            <input type="file" class="form-control" value="Choose Image" name="fileToUpload">
        
            <div class="input-group-btn">
              <button type="submit" form="form1" class="btn btn-default">
                <span class="glyphicon glyphicon-ok"></span>
              </button>
            </div>
          </div>
        </li>
        </form>
       <ul class="list-group media-list media-list-stream">
        <li class="list-group-item p-a">
          <h3 class="m-a-0">Timeline</h3>
       	</li>
        <li class="list-group-item media p-a">
          <?php displaytweets('followtweets');?>
        </li>	
      </ul>
        
        
      </ul>
    </div>
        
        <div class="col-md-3">
      <div class="alert alert-warning alert-dismissible hidden-xs" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a class="alert-link" href="http://newproject2-com.stackstaging.com/notifications.php">Visit your profile!</a> Check your self, you aren't looking too good.
      </div>

      <div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
          <h5 class="m-t-0">Sponsored</h5>
          <div data-grid="images" data-target-height="150">
            <img class="media-object" data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_2.jpg">
          </div>
          <p><strong>It might be time to visit Iceland.</strong> Iceland is so chill, and everything looks cool here. Also, we heard the people are pretty nice. What are you waiting for?</p>
          <button class="btn btn-primary-outline btn-sm"><a href="https://www.makemytrip.com/air/search?tripType=O&itinerary=DEL-REK-D-04Nov2018&paxType=A-1&cabinClass=E&cmp=SEM%7CD%7CIF%7CG%7CRoute%7CIF_Country_Only_Exact%7CIceland_Exact%7CETA%7CRegular%7CNewFunnel%7C189413391820&s_kwcid=AL%211631%213%21189413391820%21e%21%21g%21%21iceland+tickets&ef_id=Wyfv0AAAA36QJsFc%3A20181021035516%3As">Buy a ticket</a></button>
        </div>
      </div>

      <div class="panel panel-default m-b-md hidden-xs">
        <div class="panel-body">
        <h5 class="m-t-0">Suggested <small>· <a href="http://newproject2-com.stackstaging.com/notifications.php">View All</a></small></h5>
        <ul class="media-list media-list-stream">
          <li class="media m-b">
            <?php displaytweets('users2');?>
          </li>
        </ul>
        </div>
        <div class="panel-footer">
          Some Interesting people you might like.Although we Doubt it.
        </div>
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
        $('.retweet').click(function(e) {
        alert($(this).attr("data-tweet"));
         var x=$(this).attr("data-tweet");
         $.post('retweet.php', { follow: x }, function(result) { 
   			alert(result); 
		});
    });
      $('.viewuser').click(function(e) {
        alert($(this).attr("dataid"));
         var x=$(this).attr("dataid");
         $.post('view.php', { follow: x }, function(result) { 
   			alert(result); 
		});
    });
      $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    </script>
  </body>
</html>

