<?php
	$connect=mysqli_connect("localhost","root","","myproject")or failed("connection-failed");
	if (!empty($_GET['dlt']))
	{
		$id=$_GET['dlt'];
		$query="delete from product where id=$id";
		if (mysqli_query($connect,$query)) 
		{
			echo "record saved";
		}
		else
		{
			echo "record saved";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>business</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
				</div>
				<div class="para">
					<p>This section display the list of pages.</p>
				</div>
				<div class="create-page">
					<p><a href="">click here</a>To Create <a href="">New Pages</a></p>
				</div>
				<table class="border">
					<tr class="search-text">
						<td>Product search</td>
					</tr>
					<tr class="input-info">
						<td>
							<form>
								product Name:
								<input type="text" name="s">
								<input type="submit" value="search.....">
							</form>
						</td>
					</tr>
				</table>
				<div class="page">
					<p> Page 1 of 2, showing 10 records out of 13  total, starting on record 1.ending of 0</p>
				</div>
				<form method="post">
					<table class="info">
						<tr class="bottom-border">
							<td>ID</td>
							<td>Product Name</td>
							<td>Product discription</td>
							<td>Product price</td>
							<td>Product quantity</td>
							<td>Display Name</td>
							<td>status</td>
							<td>Delete</td>
							<td>Edit</td>
						</tr>
						<?php
							if (!empty($_GET['s'])) 
							{
								$ss=$_GET['s'];
								$query="select * from product where product_name like '%$ss'";
							}
							else
							{
								$query="select * from product";
							}
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result))
								{
						?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['product_name'] ?></td>
								<td><?php echo $row['product_discription'] ?></td>
								<td><?php echo $row['product_price'] ?></td>
								<td><?php echo $row['product_quantity'] ?></td>
								<td><?php echo $row['display_name'] ?></td>
								<td><?php echo $row['status'] ?></td>
								<td><a href="productadd.php?dlt=<?php echo $row['id']?>">delete</a></td>
								<td><a href="product.php?edt=<?php echo $row['id']?>">edit</a></td>
							</tr>
							<?php }
							?>
							<tr class="border-info">
								<td colspan="10">
									<span>Previous<a href="index.php">|1|<a href="product.php">2</a></a>Next</span>
								</td>
							</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="footer-line">
		
	</div>
</body>
</html>