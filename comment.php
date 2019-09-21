<?php
session_start();
$username=$_SESSION['user'];
echo $username;
$date=date('Y-m-d h:i:s');
include("connect.php");
if (!empty($_POST)) 
{
  $username=$_SESSION['user'];
  $comment=$_POST['comment'];
  $id=$_POST['id'];
  $query="INSERT INTO `REPLY` VALUES('$id','$username','$comment','$date');";
  $result=mysqli_query($link,$query);
  $var=rand(1,10000);
  $status=$username." Replied on Your Post";
  $query3="SELECT USER_ID FROM TWEETS WHERE TWEET_ID='".$id."';";
  $result3=mysqli_query($link,$query3);
  $row2=mysqli_fetch_assoc($result3);
  $query2="INSERT INTO NOTIFICATION VALUES('$var','$status','$date','$username','".$row2['USER_ID']."');";
  $result2=mysqli_query($link,$query2);
  if($result && $result2)
  {
  	echo "successfully Commented";
    echo "<script> location.href='http://newproject2-com.stackstaging.com/profile.php'; </script>";
  }
  else
  {
    echo "error";
    echo "<script> location.href='http://newproject2-com.stackstaging.com/profile.php'; </script>";
  }
}
