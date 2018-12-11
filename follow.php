<?php
session_start();
$username=$_SESSION['user'];
echo $username;
$date=date("Y/m/d");
include("connect.php");
if (!empty($_POST)) 
{
  
  $query="INSERT INTO FOLLOWER VALUES('$username','".$_POST['follow']."','n','$date');";
  $result=mysqli_query($link,$query);
  if($result)
  {
  	echo "successfully followed";
  }
  else
  {
    echo "Already Following";
  }
}
?>