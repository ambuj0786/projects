<?php session_start();

   $connect=mysqli_connect("localhost","root","","form")or failed("connection-failed");

   	if(!empty($_GET['save'])) 
   	{
   	  $na=$_GET['n'];
   	  $ma=$_GET['m'];
   	  if ($na=="admin" && $ma=="admin") 
   	  {
   	  	$_SESSION['uname']="set";
   	  	header('location:newforms1.php');

   	  }
   	  else
   	  {
   	  	echo"connection failed";
   	  }

   	}
   	if (!empty($_GET['log'])) 
   	{
   		session_destroy();
   	}

 ?>
 <form>
 	Username<input type="text" name="n"><br>
 	Passsword<input type="password" name="m"><br>
 	<input type="submit" name="save" value="submit">
 </form>