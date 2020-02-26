<?php
																										
	$connect=mysqli_connect("localhost","root","","mydb1") or fail("Connection Failed");
	// mysql_connect= function // localhost - servername // root- username // mydb - password

	$query="insert into student(name,marks,rollno) values('Ambuj',110,11)";
	// tablename - student // name,marks - column name

	if(mysqli_query($connect,$query))
	{
		echo "Record Inserted";
	}
	else
	{
		echo "Record Not Inserted";
	}
?>