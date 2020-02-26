<?php session_start();
	
	$connect=mysqli_connect("localhost","root","","form")or fail("connetion failed");

	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		if($na=="admin" && $ma=="admin")
		{
			$_SESSION['uname']="set";
			header('location:home1.php');
		}
		else
		{
			echo "failed";
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
	<input type="submit" name="save"  value="login">
</form>