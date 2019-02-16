<?php

$link=mysqli_connect("localhost","username","password","Database name");
if(mysqli_connect_error())
{
  die("There was an unexpected error");
  echo "Click here to Login again<a href='http://newproject2-com.stackstaging.com/index.php'>Login</a>";
}
?>
