<?php
include('conn.php');
 $id=$_GET['id'];
 $sql="DELETE FROM products WHERE id='$id'";
 $result=mysqli_query($db,$sql);
  if($result)
  { 
  echo "Delete Success...";
  header ('Location:index.php');
  
  }
  else
  {
	  echo "Could not delete";
  }
  mysqli_close($db);
 ?>