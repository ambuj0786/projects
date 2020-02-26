<?php
	$connect=mysqli_connect("localhost","root","","myproject") or failed("connection-failed");
	if(!empty($_POST['save']))
	{
		$name=$_POST['n'];
		$query="insert into category (name) values ('$name')";

		if (mysqli_query($connect,$query)) 
		{
			echo" record saved";
		}
		else
		{
			echo" record  not saved";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>business</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
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
								<p >Page category</p>
								<hr class="hr1">
							</div>
							<div class="para">
								<div class="page-head">
									<p>Add category</p>
								</div>
								<form method="post">
									<table class="border">
										<tr class="name">
											<td><span>Name*</span> <input type="text" name="n"></td>
										</tr>
									</table>
									<div class="btn">
										<input type="submit" name="save" value="save">
										<input type="submit" name="save" value="cancel">
								</form>
									</div>
	 							</div>		
							</div>
						</div>
					</div>
				</div>
				<div class="footer-line">
						
				</div>
</body>
</html>