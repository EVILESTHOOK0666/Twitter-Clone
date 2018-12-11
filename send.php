<?php
session_start();
include("connect.php");
$user=$_SESSION['user'];
if(!empty($_POST))
{
  $to=$_POST['to'];
  $message=$_POST['message'];
  $date=date('Y/m/d h:i:s a');
  $id=rand(1,1000000);
  $query="INSERT INTO MESSAGES VALUES('$user','$to','$id','$message','$date');";
  $result=mysqli_query($link,$query);
  $id2=rand(1,1000000);
  $status=$user." Messaged you";
  $query2="INSERT INTO NOTIFICATION VALUES('$id2','$status','$date','$user','$to');";
  $result2=mysqli_query($link,$query2);
  
  if($result && $result2)
  {
    echo"Successfully Messaged";
    echo "<script> location.href='http://newproject2-com.stackstaging.com/message.php',true;</script>";
  }
  else
  {
    echo "error";
  }
}
?>