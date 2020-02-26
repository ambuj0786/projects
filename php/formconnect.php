<?php
	$connect=mysqli_connect("localhost","root","","mydb") or fail("Connection Failed");
	// mysql_connect= function // localhost - servername // root- username // mydb - password
	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		if(!empty($_GET['editid'])){
			$id=$_GET['editid'];
			$query="update st set name='$na',marks='$ma' where id=$id";
		}else{
			$query="insert into st(name,marks) values('$na',$ma)";
		}
		// tablename - student // name,marks - column name
		if(mysqli_query($connect,$query))	
		{
			echo "Record Inserted";
		}
		else
		{
			echo "Record Not Inserted";
		}
	}
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from st where id=$id";
		if(mysqli_query($connect,$query))
		{
			echo "Record Deleted";
		}
		else
		{
			echo "Record Not Deleted";
		}
	}
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from st where id=$id";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>

<form>
	<input type="hidden" name="editid" value="<?php if(!empty($ro['id'])) echo $ro['id']?>"/>
	Enter Name <input type="text" name="n" value="<?php if(!empty($ro['name'])) echo $ro['name']?>"/><br/>
	Enter Marks <input type="text" name="m"  value="<?php if(!empty($ro['marks'])) echo $ro['marks']?>"/><br/>
	<input type="submit" name="save" value="Save Form"/>
</form>
<table border="2" width="80%">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Marks</td>
		<td>Delete</td>
		<td>Edit</td>
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
		<td><a href="formconnect.php?did=<?php echo $row['id']?>">Delete</a></td>
		<td><a href="formconnect.php?eid=<?php echo $row['id']?>">Edit</a></td>
	</tr>
	<?php }?>
</table>