<?php
session_start();
$username=$_SESSION['user'];
include("connect.php");
if (!empty($_POST)) 
{
  $username=$_SESSION['user'];
  $id=$_POST['follow'];
  
  $query="DELETE FROM `TWEETS` where TWEET_ID='".$id."'";
  $result=mysqli_query($link,$query);
  if($result )
  {
  	echo "successfully Deleted";
  }
  else
  {
    echo "error";
  }
}
