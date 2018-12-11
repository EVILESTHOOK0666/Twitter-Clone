<?php
session_start();
include("connect.php");
global $link;
$username=$_POST['follow'];
global $username;
$_SESSION['view']=$username;
echo "redirecting";
?>
