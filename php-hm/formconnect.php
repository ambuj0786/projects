<?php
	$connect=mysqli_connect("localhost","root","","mydb1") or fail("Connection Failed");
	// mysql_connect= function // localhost - servername // root- username // mydb - password
	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		$query="insert into st(name,marks)value('$na',$ma)";

		if(mysqli_query($connect,$query))
		{
			echo "Record inserted";
		}
		else
		{
			echo "Record not inserted";
			// n=nishatn&m=12&save=save+form
		}
	}
?>
	<form>
		Enter Name<input type="text" name="n"/><br/>
		Enter marks<input type="text" name="m"/><br/>
		<input type="submit" name="save" value="save form">
	</form>
	
	<table border="2" width="80%">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Marks</td>
		</tr>
		<?php 
		
			$query="select * from st";
			$result=mysqli_query($connect,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				
		?>
			<tr>
				<td><?php echo $row['id']?></td>
				<td><?php echo $row['name']?></td>
				<td><?php echo $row['marks']?></td>
			</tr>
	<?php }?>
	</table>
