<?php
include('header.php');
include('../conn.php');
$id=$_GET['id'];
$sql="SELECT * FROM customers WHERE id='$id'";
$result=mysqli_query($db,$sql);
$item=mysqli_fetch_assoc($result);
if(!$result)
{
	echo " Data not Found";
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$sql="UPDATE customers SET name='$name',address='$address',contact='$contact'where id='$id'";
	$result=mysqli_query($db,$sql);
	if (!$result)
	{
		echo "Couldnot update data";
		die;
	}
	echo "Data updated successfully";
	header("Location:index.php");

}
mysqli_close($db);

?>
<html>
<head>
<title> Customers</title>

</head>
<body>
<div class="container-fluid" style="height:8%" >
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">
<li ><a href="../index.php">Home</a></li>
<li> <a href="../products/index.php">Products</a></li>
<li > <a href="../suppliers/index.php">Suppliers</a></li>
<li class="active"> <a href="index.php"><b>Customers</b></a></li>
<li > <a href="../sales/index.php">Sales</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right" style="margin-left: 700px;">
 	<li> <a href="../user/index.php">Users</a></li>
  <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </ul>
</div>
</nav>
</div>
<div class="row content">
<div class="col-sm-2 sidenav" style=" background-color:#d5dae2; height:80%">
<h3>Customers Menu</h3>
<ul class="nav nav-pills nav-stacked">
<li > <a href="index.php">Home </a></li>
<li > <a href="add_customers.php"> Add </a> </li>
<li class="active"> <a href="update.php"> <b>Update</b> </a> </li>
<li > <a href="delete.php"> Delete </a> </li>
</ul>


</div>


<div class="col-sm-10" style="background-color:white; height:80%"> 

<div class="container-fluid" align="center">
<div style="width:30%; margin-top:1%; border:double 5px grey;" align="left">
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; color:red;"><b>Update Customers Details</b></div>
<div style="font-size:13px; text align:center; color:#cc000; margin-top:2%">
<div style="margin:5%">
<form method="POST" action="" class="form-group" style="color:red">
<label>Customer Name:</label>
<input type="text" class="form-control" name="name" style="width:200px" value="<?php echo$item['name'];?>"/>

<label>Customer Address:</label>
<input type="text" class="form-control" name="address" style="width:200px" value="<?php echo$item['address'];?>"/>

<label>Contact Number:</label>
<input type="text" class="form-control" name="contact" style="width:200px" value="<?php echo$item['contact'];?>" maxlength="10"/>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="footer col-sm-12" style= "background-color:#6886A0;height:12%" align="center">
<div class="row content">
 <a href="#"><img src="../images/facebook.gif" alt="" /></a>
 <a href="#"><img src="../images/twitter.gif" alt="" /></a> 
 <a href="#"><img src="../images/youtube.gif" alt="" /></a> 
 <div >
    <p><h4>Copyright &copy; <a href="index.php" style="color:red">Jhapa Stores</i></a> - All Rights Reserved || </h4></p>
 </div>
</div>
</div>


</body>
</html>
