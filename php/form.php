<?php
	$connect=mysqli_connect("localhost","root","","newdb1")or fail("Connection Failed");

	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		if(!empty($_GET['editid'])) 
		{
			$id=$_GET['editid'];
			$query="update st set name='$na',marks='$ma' where id=$id";
		}
		else{
			$query="insert into st(name,marks)value('$na',$ma)";
		}
		if(mysqli_query($connect,$query)) 
		{
			echo "record inserted";
		}
		else
		{
			echo "record  not inserted";
		}
	}
	if (!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from st where id =$id";
		if (mysqli_query($connect,$query))
		{
			echo "record inserted";
		}
		else
		{
			echo "record not inserted";
		}
	}
	if (!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from st where id=$id";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>
<form>
	<input type="hidden" name="editid" value="<?php if(!empty ($ro['id'])) echo $ro['id']?>"/>
	Enter name<input type="text" name="n" value="<?php if(!empty ($ro['name'])) echo $ro['name']?>"/></br>
	Enter marks<input type="text" name="m" value="<?php if(!empty ($ro['marks'])) echo $ro['marks']?>"/></br>
	<input type="submit" name="save" value="save form">
</form>
<table border="2" width="40%">
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Marks</td>
		<td>delete</td>
		<td>edit</td>
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
			<td><a href="form.php?did=<?php echo $row ['id']?>">Delete</a></td>
			<td><a href="form.php?eid=<?php echo $row ['id']?>">Edit</a></td>
		</tr>
<?php }?>
</table>