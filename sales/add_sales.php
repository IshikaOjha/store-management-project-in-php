<?php 
include('header.php');
include('../conn.php');

function getCustomer($c_id){
include('../conn.php');
$c_sql="select name from customers where id='$c_id'";
$data=mysqli_query($db,$c_sql);
$result=mysqli_fetch_assoc($data);
return $result['name'];
}

$rmessage = isset($_GET['message']) ? $_GET['message'] : " ";
if (isset($_POST['submit']))
{
	$customer=$_POST['customer'];
	$product=$_POST['product'];
	$quantity=$_POST['quantity'];
	$discount=$_POST['discount'];
	$date = date('Y-m-d');
	if(!$discount){
	$discount=0;
	}
	$product_query="select *  from products where id='$product'";
	$result=mysqli_fetch_assoc(mysqli_query($db,$product_query));
	
	if($quantity > $result['quantity']){
		$message = "Sales cannot be made. Available quantity is only {$result['quantity']}"; 
		header("location:add_sales.php?message=$message");
	}else{
		$amount=$result['sp']*$quantity-$discount;
		$sql="INSERT INTO sales(customer,product,quantity,discount,amount,sales_date) VALUES ('$customer','$product','$quantity','$discount','$amount','$date')";
		$sales=mysqli_query($db,$sql);
		$qty=$result['quantity']-$quantity;
		$update_qty="update products set quantity='$qty' where id='$product'";
		$qnty=mysqli_query($db,$update_qty);
		
		if($sales)
		{
			header("location:add_sales.php");
		}
		else
		{
			echo mysqli_error($db);die;
		}	
	}	
	
}
$product="select * from products";
$product_result=mysqli_query($db,$product);
$customer="select  * from customers";
$customer_result=mysqli_query($db,$customer);
$sql="SELECT * FROM sales";
$result=mysqli_query($db,$sql);
if(!$result)
{
	echo"No Data Found";
}

$sql_sales="SELECT * FROM sales where bill_id=0";
$result_sales=mysqli_query($db,$sql_sales);

?>
<html>
<head>
<title> Add Sales</title>

</head>
<body>
<div class="container-fluid" style="height:8%">
<nav class="navbar navbar-default navbar-fixed-top" >
<div class="navbar-header">
<a class="navbar-brand" href="../index.php"> Jhapa Stores </a>
<ul class="nav navbar-nav">
<li > <a href="../index.php">Products</a></li>
<li > <a href="../suppliers/index.php">Suppliers</a></li>
<li > <a href="../customers/index.php">Customers</a></li>
<li class="active"> <a href="index.php"><b>Sales</b></a></li>
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
<li class="active"> <a href="add_sales.php"> <b>Add</b> </a> </li>
<li> <a href="bill_index.php"> Bill </a> </li>
<li> <a href="report.php"> Report </a> </li>

</ul>
</div>


<div class="col-sm-10 float" style="background-color:white;"> 
<div class="container-fluid" align="center">
<div style="width:30%; margin-top:1%; border:double 5px grey; height:float" align="left">
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; color:red;"><b>Input Sales Details</b></div>
<?= $rmessage;?>
<div style="font-size:13px; text align:center; color:#cc000; margin-top:2%">
<div style="margin:5%">
<form method="POST" action="" class="form-group" style="color:red">

<label>Customer Name:
<select name="customer" class="form-control" style="width:200px" required="true">
<?php while($data=mysqli_fetch_assoc($customer_result)){?>
	<option value="<?php echo $data['id'];?>"><?php echo $data['name']; ?></option> 
<?php } ?>
</select>
</label>


<label>Products:
<select name="product" class="form-control" style="width:200px" required="true">
<?php while($p_data=mysqli_fetch_assoc($product_result)){?>
	<option value="<?php echo $p_data['id'];  ?>"><?php echo $p_data['name']; ?></option>
<?php }?>
</select>
</label>
<br>
<label>Quantity:</label>
<input type="number" class="form-control" name="quantity"/ style="width:200px" required="true"/>


<label>Discount:</label>
<input type="number"  class="form-control" name="discount" style="width:200px" />
<br/>
<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
</form>



</div>
</div>
</div></br>

<div style=" margin-top:1%; border:double 5px blue; height:float" align="left">
<div class="panel panel-heading" align="center" style="background-color:#d5dae2; font-size:20px; color:red;"><b> Sales Details</b></div>
<div class="table-responsive" >
<table class="table table-hover" style=" border:solid 1px black" >
<thead style="color:red;">
<tr>
<th>Sales Id</th>
<th>Date</th>
<th>Customer Name</th>
<th>Particulars</th>
<th>Quantity</th>
<th>Discount</th>
<th>Amount</th>
</tr>
</thead>
<?php while($item=mysqli_fetch_assoc($result_sales)){?>
<tr>
<td> <?php echo$item['id'];?></td>
<td> <?php echo$item['sales_date'];?></td>
<td> <?php echo getCustomer($item['customer']);?></td>
<td> <?php echo$item['product'];?></td>
<td> <?php echo$item['quantity'];?></td>
<td> <?php echo$item['discount'];?></td>
<td> <?php echo$item['amount'];?></td>                              
</tr>
<?php }?>

</table>
</div>
</div>
<form method="GET" action="bill.php">
<select name="c_id" class="form-control" style="width:200px">
<?php
$sq="select distinct customer from sales";
$sq_exec=mysqli_query($db,$sq);
 while($datas=mysqli_fetch_assoc($sq_exec)){?>
	<option value="<?php echo $datas['customer'];?>"><?php echo getCustomer($datas['customer']); ?></option> 
<?php } ?>
</select>
<input type="submit" value="Generate Bill" name="submit" class="btn btn-success btn-md"/>
</form>
</div>
</div>
</div>

<div class="footer"align="center"  >
<div class="row content col-sm-14"align="center" style= "background-color:#6886A0;  " >
 <a href="#"><img src="../images/facebook.gif" alt="" /></a>
 <a href="#"><img src="../images/twitter.gif" alt="" /></a> 
 <a href="#"><img src="../images/youtube.gif" alt="" /></a> 
 <div >
    <p><h4>Copyright &copy; <a href="../index.php" style="color:red">Jhapa Stores</i></a> - All Rights Reserved || </h4></p>
 </div>
</div>
</div>






