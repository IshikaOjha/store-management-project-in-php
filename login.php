<?php
include('header.php');
include('conn.php');
session_start();
$error="";
if (isset($_POST['submit']))
{
	$myusername=$_POST['username'];
	$mypassword=$_POST['password'];
	$sql="select * FROM user where username='$myusername' and password='$mypassword'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result);
	$count=mysqli_num_rows($result);
	if ($count==1)
	{
		$_SESSION['user']=$myusername;
		header("location:index.php");
		
	}
else
{
$error="Your Login Name or Password is invalid";	
}
}
?>
<html>
<head>
<title>
Login Page
</title>
</head>
<body bgcolor="#FFFFFF">
<div align="center">
<div style="width:300px; margin-top:150px; border:solid 1px #333333;" align="left">
<div class="panel panel-heading" align="center" ><b>Login form</b></div>
<div style="font-size:11px; text align:center; color:#cc000; margin-top:10px"><?php echo $error;?> </div>
<div style="margin:30px">

<form action="" method="post" class="form-group">
 <label>User Name:</label>
 <input type="text" name="username" class="form-control" required="true" autocomplete="off"/> <br/>
 <label>Password:</label>
 <input type="password" name="password" class="form-control" required="true"/> <br/>
<input type="reset" name="reset" class="btn btn-md  btn-primary" value="Cancel"/> 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
 <input type="submit" name="submit" class="btn btn-md  btn-primary" value="Login" />
</form>
</div>
</div>
</div>
</body> 

</html>