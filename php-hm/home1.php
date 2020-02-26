<?php session_start();
	
	if(empty($_SESSION['uname']))
	{
		header('location:session.php');
	}

?>
welcome to the home
<a href="session.php?log=1">logout</a>