<?php
include('header.php');
include('../conn.php');
$id=$_GET['c_id'];
$bill_id=$_GET['bill_id'];
$sqls="SELECT * from sales where customer='$id' AND bill_id='$bill_id'";
	$results=mysqli_query($db,$sqls);
?>
<html>
<head>
<style>
 td{
 	width: 150px;
 }
</style>
<title> Store Management System</title>

</head>
<body>
<div class="container-fluid" style="height:8%" >
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="../index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">
<li> <a href="../index.php">Products</a></li>
<li> <a href="../suppliers/index.php">Suppliers</a></li>
<li > <a href="../customers/index.php">Customers</a></li>
<li class="active"> <a href="../sales/index.php"><b>Sales</b></a></li>
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
<h3>Sales Menu</h3>
<ul class="nav nav-pills nav-stacked">
<li > <a href="index.php"> Home</a></li>
<li> <a href="add_sales.php"> Add </a> </li>
<li  class="active"> <a href="bill_index.php"> <b>Bill</b> </a> </li>
<li> <a href="report.php"> Report </a> </li>

</ul>
</div>


<div class="col-sm-10 "  align="center" style=" background-color:white;">
<div style="width:50%; margin-top:2%; border:solid 3px grey; background-color:#C1A39D; height:75%" >
<div class="panel panel-heading" align="center" style=" color:red;"><b style=" font-size:30px;"> Jhapa Stores</b><br><b>Birtamode,Jhapa</b>
</div>
<div class="pull-right" ><b>  <?php echo"Date:". date("Y/m/d") ."";?> </b>
</div>
<table class="table table-bordered" style="height:60%;"> 
<thead>
	<tr>
		<th style="width:10%" >Sn</th>
		<th style="width:20%">Particulars</th>
		<th style="width:20%">Quantity</th>
		<th style="width:20%">Amount</th>
	</tr>
	</thead>
	<?php $sn=1; 
	$totalAmount=0;
	while($item=mysqli_fetch_assoc($results)){
	 ?>
	<tr >
		<td><?php echo $sn; ?></td>
			<?php 
    $product_id=$item['product'];
    $sql="SELECT name from products where id='$product_id'";
    $p_name=mysqli_fetch_assoc(mysqli_query($db,$sql));
?>    
<td> <?php echo $p_name['name'];?></td>
		<td><?php echo $item['quantity']; ?></td>
		<td><?php echo $item['amount']; ?></td>
	</tr><br>
	<?php $sn++; 
	$totalAmount+=$item['amount'];

	 }
	?>
	<tr>
		<td colspan="3">Total</td>
		<td><?php echo $totalAmount; ?></td>
	</tr>
</table>
</div><br><br><br>
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
