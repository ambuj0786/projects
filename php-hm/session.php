<?php session_start();

	$connect=mysqli_connect("localhost","root","","form")or failed("connection failed");

	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		if
		{
			$_SESSION['uname']="set";
			header('location:home1.php');
		}
		else
		{
			echo"connecton failed";
		}
	}
	if(!empty ($_GET['log']))
	{
		session_destroy();
	}

?>
<form>
		username<input type="text" name="n"><br>
		password<input type="password" name="m"><br>
		<input type="submit" name="save" value="login">
</form>