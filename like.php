<?php
session_start();
$username=$_SESSION['user'];
echo $username;
$date=date('Y-m-d h:i:s');
include("connect.php");
if (!empty($_POST)) 
{
  $username=$_SESSION['user'];
  $name=$_POST['follow'];
  $query="INSERT INTO `LIKE` VALUES('$name','$username');";
  $result=mysqli_query($link,$query);
  $var=rand(1,10000);
  $query2="SELECT USER_ID FROM TWEETS WHERE TWEET_ID='".$name."';";
  $result2=mysqli_query($link,$query2);
  $row2=mysqli_fetch_assoc($result2);
  $status=$username." Liked Your Post";
  $query2="INSERT INTO NOTIFICATION VALUES('$var','$status','$date','$username','".$row2['USER_ID']."');";
  $result2=mysqli_query($link,$query2);
  if($result && $result2)
  {
  	echo "successfully Liked";
  }
  else
  {
    echo "You Can Like only Once";
  }
}
