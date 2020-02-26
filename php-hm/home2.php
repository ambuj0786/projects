<?php session_start();
	
	if (empty($_SESSION['uname'])) {
		
		header('location:session2.php');
	}
?>
Welcome to the home page
<a href="session2.php?log=1">logout</a>
