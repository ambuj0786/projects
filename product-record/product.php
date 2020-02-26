<?php
	$connect=mysqli_connect("localhost","root","","myproject")or failed("connection-failed");
	$msg="";
	if(!empty($_POST['save']))
	{
		$ProductName=$_POST['a'];
		$Productdiscription=$_POST['b'];
		$Productprice=$_POST['c'];
		$Productquantity=$_POST['d'];
		$DisplayName=$_POST['e'];
		$status=$_POST['f'];
		if($status=="on")
		{
			$status=1;
		}
		else
		{
			$status=0;
		}
		if (!empty($_GET['edt'])) {
			$id=$_GET['edt'];
			$query="update product set product_name='$ProductName',product_discription='$Productdiscription',product_price='$Productprice',product_quantity=$Productquantity,display_name='$DisplayName',status='$status' where id=$id";
		}
		else{
			$query="insert into product(product_name,product_discription,product_price,	product_quantity,display_name,status) values('$ProductName','$Productdiscription','$Productprice','$Productquantity','$DisplayName','$status')";

		}
		if (mysqli_query($connect,$query)) 
		{
			header('location:productadd.php');
		}
		else
		{
			echo "record not saved";
		}									
	}
	if (!empty($_GET['edt'])) {
		$id=$_GET['edt'];
		$query="select * from product where id=$id ";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>business</title>
		<link rel="stylesheet" type="text/css" href="css/style1.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="main-header">
		<div class="header-info">
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
		</div>	
		<div class="business-info">
			<div class="login-info">
				<div class="left-list">
					<ul class="list-info">
						<li class="licontent">Page Summary</li>
						<li class="content">Add Page</li>
						<li class="licontent">Event Summary</li>
						<li class="content">Add Event</li>
						<li class="licontent">Change Password</li>
						<li class="licontent">Module Summary</li>
						<li class="Login-info">Login information <br/> username:admin<br/>Email:example@gmal.com
						</li>
					</ul>
				</div>
				<div class="page-info">
					<div class="head">
						<p >Product Manager</p>
						<hr class="hr1">
						<?php echo$msg;?>
					</div>
					<div class="para">
						<div class="page-head">
							<p>Add Product</p>
						</div>
						<form method="post">
							<table class="info">
								<tr>
									<td>
										<input type="hidden" name="editid" 
										value="<?php if(!empty($ro['id'])) echo $ro ['id']?>">
									</td>
								</tr>
								<tr class="inpt">
									<td><span>Product Name</span></td>
									<td><input type="text" name="a" value="<?php if(!empty($ro['product_name'])) echo $ro ['product_name']?>"></td>
								</tr>
								<tr class="inpt">
									<td><span>Product Description</span></td>
									<td><input type="text" name="b" value="<?php if(!empty($ro['product_discription'])) echo $ro ['product_discription']?>"></td>
								</tr>
								<tr>
									<td><span>Product Price</span></td>
									<td><input type="text" name="c" value="<?php if(!empty($ro['product_price'])) echo $ro ['product_price']?>"></td>
								</tr>
								<tr>
									<td><span>Product Quantity</span></td>
									<td><input type="text" name="d" value="<?php if(!empty($ro['product_quantity'])) echo $ro ['product_quantity']?>"></td>
								</tr>
									<td><span>Display Name</span></td>
									<td><input type="text" name="e" value="<?php if(!empty($ro['display_name'])) echo $ro ['display_name']?>"></td>
								</tr>
								<tr>
									<td><span>Status</span></td>
									<td><input type="checkbox" name="f" value="<?php if(!empty($ro['status'])) echo $ro ['status']?>"></td>
								</tr>
								<tr class="border-info">
									<td colspan="10">
										<input class="delete-btn" type="submit" name="save" value="save">
									</td>
								</tr>
							</table>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>
	<div class="footer-line">
				
	</div>
</body>
</html>
https://www.flipkart.com/sony-wh-ch510-google-assistant-enabled-bluetooth-headset/p/itm49ad387d22902?pid=ACCFKYCBAETWPBZX&lid=LSTACCFKYCBAETWPBZX7UDKJF