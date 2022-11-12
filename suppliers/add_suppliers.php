<?php
include('header.php');
include('../conn.php');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$person=$_POST['person'];
	$note=$_POST['note'];
	$sql="INSERT INTO suppliers(name,address,contact,person,note) VALUES  ('$name','$address','$contact','$person','$note')";
if(mysqli_query($db,$sql))
{
	header("Location:index.php");
}
else
{
	echo mysqli_error($db);
}
mysqli_close($db);
}

?>
<html>
<head>
<title> Suppliers</title>

</head>
<body>
<div class="container-fluid" style="height:8%" >
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">
<li> <a href="../index.php">Products</a></li>
<li class="active"> <a href="index.php"><b>Suppliers</b></a></li>
<li > <a href="../customers/index.php">Customers</a></li>
<li > <a href="../sales/index.php">Sales</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right" style="margin-left: 700px;">
 	<li> <a href="../user/index.php">Users</a></li>
  <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </ul>
</div>
</nav>
</div>
<div class="row content  float" style=" background-color:#d5dae2; ">
<div class="col-sm-2 sidenav " >
<h3>Suppliers Menu</h3>
<ul class="nav nav-pills nav-stacked">
<li > <a href="index.php">Home </a></li>
<li class="active"> <a href="add_suppliers.php"><b> Add</b> </a> </li>
<li> <a href="update.php"> Update </a> </li>
<li> <a href="delete.php"> Delete </a> </li>

</ul>


</div>


<div class="col-sm-10 float" style="background-color:white;"> 
<div class="container-fluid" align="center">
<div style="width:30%; margin-top:1%; border:double 5px grey;" align="left">
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; color:red;"><b>Input Suppliers Details</b></div>
<div style="font-size:13px; text align:center; color:#cc000; margin-top:2%">
<div style="margin:5%">
<form method="POST" action="" class="form-group" style="color:red">
<label>Supplier Name:</label>
<input type="text" class="form-control" name="name" style="width:200px" required="true"/>

<label>Supplier Address:</label>
<input type="text" class="form-control" name="address" style="width:200px" required="true"/>

<label>Contact Number:</label>
<input type="text" class="form-control" name="contact" style="width:200px" required="true" maxlength="10"/>

<label>Contact Person:</label>
<input type="text" class="form-control" name="person" style="width:200px"/>

<label>Note:</label>
<input type="text" class="form-control" name="note" style="width:200px"/>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
</form>
</div>
</div>
</div>
</div>
<br><br><br><br><br><br>
</div>
</div>


<div class="footer col-sm-12" style= "background-color:#6886A0;height:12%" align="center">
<div class="row content">
 <a href="#"><img src="../images/facebook.gif" alt="" /></a>
 <a href="#"><img src="../images/twitter.gif" alt="" /></a> 
 <a href="#"><img src="../images/youtube.gif" alt="" /></a> 
 <div >
    <p><h4>Copyright &copy; <a href="../index.php" style="color:red">Jhapa Stores</i></a> - All Rights Reserved || </h4></p>
 </div>
</div>
</div>


</body>
</html>
