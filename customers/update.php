<?php
include('header.php');
include('../conn.php');
$sql="SELECT * FROM customers";
$result=mysqli_query($db,$sql);
if(!$result)
{
	echo"No Data Found";
}
?>
<html>
<head>
<title> Customers</title>

</head>
<body>
<div class="container-fluid" style="height:8%" >
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="../index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">
<li> <a href="../index.php">Products</a></li>
<li> <a href="../suppliers/index.php">Suppliers</a></li>
<li class="active"> <a href="index.php"><b>Customers</b></a></li>
<li> <a href="../sales/index.php">Sales</a></li>
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
<h3>Customers Menu</h3>
<ul class="nav nav-pills nav-stacked">
<li > <a href="index.php"> Home </a></li>
<li> <a href="add_customers.php"> Add </a> </li>
<li class="active"> <a href="update.php"> <b>Update</b> </a> </li>
<li> <a href="delete.php"> Delete </a> </li>

</ul>
</div>


<div class="col-sm-10 "  align="center" style=" background-color:white;">
<div style="width:90%; margin-top:3%; border:solid 2.5px grey;" >
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; font-size:20px; color:red;"><b> Customers Details</b></div>
<div style="margin:5%">
<div class="table-responsive" >
<table class="table table-hover" style=" border:solid 1px black" >
<thead style="color:red;">
<tr>
<th>Customer Id</th>
<th>Customer Name</th>
<th>Customer Address</th>
<th>Contact Number</th>
<th>Action</th>
</tr>
</thead>
<?php while($item=mysqli_fetch_assoc($result)){?>
<tr>
<td> <?php echo$item['id'];?></td>
<td> <?php echo$item['name'];?></td>
<td> <?php echo$item['address'];?></td>
<td> <?php echo$item['contact'];?></td>
<td><a href="update_customer.php?id=<?php echo $item ['id'];?>"><button type="button" class="btn btn-success">Update</button></a>    </td>
</tr>
<?php } mysqli_close($db);?>
</table>
</div>
</div>
</div>
<br><br><br><br><br><br><br>
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
