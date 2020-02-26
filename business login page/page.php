<?php
	include("common/connection.php");
	if (!empty($_GET['dlt'])) 
	{
		$id=$_GET['dlt'];
		$query="delete from pages where id =$id";
		if(mysqli_query($connect,$query))
		{
			$msg="Record Not Saved";
		}
		else
		{
			$msg="Record Not Saved";
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>business</title>
	<link rel="stylesheet" type="text/css" href="cs/style3.css">
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
					<p >Page Manager</p>
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
						<td>Search</td>
					</tr>
					<tr class="input-info">
						<td >
							<form>
								Search By Name :
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
							<td>Name</td>
							<td>content</td>
							<td>Display order</td>
							<td>Delete</td>
							<td>Edit</td>
						</tr>
						<?php
							if (!empty($_GET['s'])) 
							{
								$ss=$_GET['s'];
								$query="select * from pages where name like '%$ss'";
							}
							else
							{
								$query="select * from pages";
							}
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result))
								{
							?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['content']?></td>
								<td><?php echo $row['displayorder']?></td>
								<td><a href="page.php?dlt=<?php echo $row['id'] ?>">Delete</a></td>
								<td><a href="pageadd.php?edt=<?php echo $row['id'] ?>">Edit</a></td>
							</tr>
							<?php }
							?>
							<tr class="border-info">
								<td colspan="6">
									<span>  previous  |1|2 next >></span>
									<button class="delete-btn" >Delete</button>
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