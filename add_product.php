<?php
include('header.php');
include('conn.php');
session_start();
   if(!$_SESSION['user'])
   {
	   header("location:login.php");
   }
if (isset($_POST['submit']))
{
	$code=$_POST['code'];
	$name=$_POST['name'];
	$cp=$_POST['cp'];
	$sp=$_POST['sp'];
	$quantity=$_POST['quantity'];
	$amount=$quantity*$cp;
	$supplier=$_POST['supplier'];
	$sql="INSERT INTO products(code,name,cp,quantity,amount,supplier,sp) VALUES ('$code','$name','$cp','$quantity','$amount','$supplier','$sp')";
if(mysqli_query($db,$sql))
{
	header("Location:index.php");
}
else
{
	echo mysqli_error($db);
}

}
$supplier="select * from suppliers";
$supplier_result=mysqli_query($db,$supplier);
mysqli_close($db);
?>
<html>
<head>
<title> Add Products</title>

</head>
<body>
<div class="container-fluid" style="height:8%">
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">

<li class="active"> <a href="index.php"><b>Products</b></a></li>
<li > <a href="suppliers/index.php">Suppliers</a></li>
<li > <a href="customers/index.php">Customers</a></li>
<li> <a href="sales/index.php">Sales</a></li>
</ul>
 <ul class="nav navbar-nav navbar-right" style="margin-left: 650px;">
 	<li> <a href="user/index.php">Users</a></li>
  <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  </ul>
</div>
</nav>
</div>
<div class="row content  float" style=" background-color:#d5dae2; ">
<div class="col-sm-2 sidenav " >
<h3>Products Menu</h3>
<ul class="nav nav-pills nav-stacked">
<li > <a href="index.php"> Home</a></li>
<li class="active"> <a href="add_product.php"> <b>Add</b> </a> </li>
<li> <a href="update.php"> Update </a> </li>
<li> <a href="delete.php"> Delete </a> </li>

</ul>
</div>


<div class="col-sm-10 float" style="background-color:white;"> 
<div class="container-fluid" align="center">
<div style="width:30%; margin-top:1%; border:double 5px grey;" align="left">
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; color:red;"><b>Input Products Details</b></div>
<div style="font-size:13px; text align:center; color:#cc000; margin-top:5%">
<div style="margin:10%">
<form method="POST" action="" class="form-group" style="color:red">
<label>Product code:</label>
<input type="number" class="form-control" name="code" style="width:200px" required="true"/>

<label>Product name:</label>
<input type="text" class="form-control" name="name" style="width:200px" required="true"/>

<label>Cost Price:</label>
<input type="text" class="form-control" name="cp" style="width:200px" required="true"/>
<label>Selling Price:</label>
<input type="text" class="form-control" name="sp" style="width:200px" required="true"/>

<label>Quantity:</label>
<input type="number" class="form-control" name="quantity" style="width:200px" required="true"/>

<label>Suppliers:
<select name="supplier" class="form-control" style="width:200px;margin-top:5%" required="true">
<?php while($data=mysqli_fetch_assoc($supplier_result)){?>
	<option value="<?php echo $data['name'];  ?>"><?php echo $data['name']; ?></option>
<?php }?>
</select> 
</label >
<br>
<input type="submit" name="submit" class="btn btn-primary"align="right" value="Save"/>
</form>
</div>
</div>
</div>
</div>
<br><br>
</div>
</div>

<div class="footer col-sm-12" style= "background-color:#6886A0;height:12%" align="center">
<div class="row content">
 <a href="#"><img src="images/facebook.gif" alt="" /></a>
 <a href="#"><img src="images/twitter.gif" alt="" /></a> 
 <a href="#"><img src="images/youtube.gif" alt="" /></a> 
 <div >
    <p><h4>Copyright &copy; <a href="index.php" style="color:red">Jhapa Stores</i></a> - All Rights Reserved || </h4></p>
 </div>
</div>
</div>


</body>
</html>




