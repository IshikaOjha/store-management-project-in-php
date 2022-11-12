<?php
$server='localhost';
$username='root';
$password='';
$database='store';
$db=mysqli_connect($server,$username,$password,$database);
if(!$db)
{
	echo"Error on connecting";
}
?>