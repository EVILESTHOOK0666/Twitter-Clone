<?php
session_start();
$username=$_SESSION['user'];
echo $username;
$date=date('Y/m/d h:i:s a');
include("connect.php");
if (!empty($_POST)) 
{
  $username=$_SESSION['user'];
  $name=$_POST['follow'];
  $query="INSERT INTO `RETWEET` VALUES('$name','$username','Retweet','$date');";
  $result=mysqli_query($link,$query);
  $var=rand(1,10000);
  
  $query2="SELECT USER_ID FROM TWEETS WHERE TWEET_ID='".$name."';";
  $result2=mysqli_query($link,$query2);
  $row2=mysqli_fetch_assoc($result2);
  $status=$username." Retweeted Your Post";
  $query2="INSERT INTO NOTIFICATION VALUES('$var','$status','$date','$username','".$row2['USER_ID']."');";
  
  $query4="SELECT * FROM TWEETS WHERE TWEET_ID='".$name."';";
  
  $result4=mysqli_query($link,$query4);
  
  $row4=mysqli_fetch_assoc($result4);
  
  $row4['CONTENT']='<p>Retweet-</p>'.$row4['CONTENT'];
  $var5=rand(1,100000);
  $query5="INSERT INTO TWEETS VALUES('$var5','$username','".$row4['CONTENT']."','".$row4['IMG']."','$date')";
  $result5=mysqli_query($link,$query5);
  $result2=mysqli_query($link,$query2);
  if($result && $result2 && $result5)
  {
  	echo "successfully Retweeted";
  }
  else
  {
    echo "error";
  }
}