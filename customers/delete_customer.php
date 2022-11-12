<?php

include('../conn.php');
 $id=$_GET['id'];
 $sql="DELETE FROM customers WHERE id='$id'";
 $result=mysqli_query($db,$sql);
  if($result)
  { 
  header ('Location:index.php');
  
  }
  else
  {
	  echo "Could not delete";
  }
  mysqli_close($db);
 ?>