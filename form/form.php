<?php
	
	$connect=mysqli_connect("localhost","root","","form")or fail("connetion failed");

	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		$query="insert into project(username,password)value('$na','$ma')";

		if(mysqli_query($connect,$query))
		{
			echo "record inserted";
		}
		else
		{
			echo "record not inserted";
		}
	}

?>
<form>
	username<input type="text" name="n"><br>
	password<input type="password" name="m"><br>
	<input type="submit" name="save"  value="submit">
</form>