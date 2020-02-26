<?php 
	$connect=mysqli_connect("localhost","root","","myproject")or failed("connection-failed");
   	if(!empty($_POST['save'])) 
   	{
   	  $na=$_POST['n'];
   	  $ma=$_POST['m'];
   	  $query="select * from login where username='$na' and password='$ma'";
   	  $result=mysqli_query($connect,$query);
   	  $count=mysqli_num_rows($result);
   	  if ($count>0)
   	  {
   	  	header('location:product.php');
   	  }
   	  else
   	  {
   	  	echo "Login Denied";
   	  }

   	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="header">
			<div class="business-logo">
				<img src="images/b1.png">
			</div>
		</div>
		<div class="date-time">
			<div class="date"> 
				<p>Friday, 8th june 2019</p>
			</div>
		</div>
		<div class="login-info">
			<div class="login">
				<table>
					<form method="post">
						<tr >
							<td></td>
							<td class="login-heading">Login</td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="n"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="m"></td>
						</tr>
						<tr>
							<td></td>
							<td class="login-btn"><input type="submit" name="save" value="Login"></td>
						</tr>
					</form>
				</table>
			</div>
		</div>
		<div class="footer-line">
			
		</div>
		<hr class="hr">
</body>
</html>
