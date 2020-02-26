<?php
	include('common/connection.php');
	$msg="";
	if(!empty($_POST['save']))
	{
		$name=$_POST['na'];
		$content=$_POST['ca'];
		$do=$_POST['do'];
		$st=$_POST['st'];
		if($st=="on")
		{
			$st=1;
		}
		else
		{
			$st=0;
		}
		if (!empty($_GET['edt'])){
			$id=$_GET['edt'];
			$query="update pages set name='$name',content='$content',displayorder='$do',status='$st' where id=$id";
		}
		else {
			$query="insert into pages(name,content,displayorder,status) values('$name','$content','$do',$st)";
		}
		if(mysqli_query($connect,$query))
		{
   	  		header('location:page.php');
		}
		else
		{
			$msg="Record Not Saved";
		}
	}
	if (!empty($_GET['edt'])) {
		$id=$_GET['edt'];
		$query="select * from pages where id=$id";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>business</title>
		<link rel="stylesheet" type="text/css" href="cs/style1.css">
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
						<p >Page Manager</p>
						<hr class="hr1">
						<?php echo $msg;?>
					</div>
					<div class="para">
						<div class="page-head">
							<p>Add Page</p>
						</div>
						<form method="post">
							<table class="border">
								<form>
									<tr>
										<td>
											<input type="hidden" name="editid" value="<?php if(!empty($ro['id'])) echo $ro ['id']?>">
										</td>
									</tr>
									<tr class="name">
										<td><span>Name*</span> <input type="text" name="na" value="<?php if(!empty ($ro['name'])) echo $ro ['name']?>"></td>
									</tr>
									<tr class=" name-2">
										<td><span>Content </span><input type="text" name="ca" value="<?php if(!empty ($ro['content'])) echo $ro ['content']?>"></td>
									</tr>
									<tr  class="Display ">
										<td><span>Display order </span><input type="text" name="do" value="<?php if(!empty ($ro['displayorder'])) echo $ro ['displayorder']?>"></td>
									</tr>
									<tr class="Status">
										<td><span>status </span><input type="checkbox" name="st" value="<?php if(!empty ($ro['status'])) echo $ro ['status']?>"></td>
									</tr>
								</form>
							</table>
							<div class="btn">
								<input type="submit" name="save" value="Save"> 
								<button> Cancel</button>
							</div>
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