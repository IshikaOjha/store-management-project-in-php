<?php
if (isset ($_COOKIE['user'] ) )
{
  unset($_COOKIE['user']);
  setcookie('user',null,-1,'/');
  header("location:login.php");
}
header("location:login.php");
?>