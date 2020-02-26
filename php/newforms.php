<?php 
	$connect=mysqli_connect("localhost","root","","newdb")or failed("connecton-failed");

	if (!empty($_GET['save'])) 
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		$ba=$_GET['p'];
		if (!empty($_GET['editid'])) {
			$id=$_GET['editid'];
			$query="update st set name='$na',marks='$ma',marks2='$ba' where id=$id ";
		}
		else
		{
			$query="insert into st (name,marks,marks2) values('$na',$ma,$ba)";
		}
		if(mysqli_query($connect,$query))
		{
			echo "record inserted";
		}
		else
		{
			echo "record not inserted";
		}
	}
	if (!empty($_GET['did'])) 
	{
		$id=$_GET['did'];
		$query="delete from st where id =$id";
		if(mysqli_query($connect,$query))
		{
			echo "record inserted";
		}
		else
		{
			echo "record not inserted";
		}
	}
	if (!empty($_GET['eid'])) {
		
		$id=$_GET['eid'];
		$query="select * from st where id=$id";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>
<form>
	<input type="hidden" name="editid" value="<?php if(!empty($ro['id'])) echo $ro ['id']?>">
	Enter name<input type="text" name="n" value="<?php if(!empty ($ro['name'])) echo $ro ['name']?>"><br>
	Enter marks<input type="text" name="m" value="<?php if(!empty ($ro['marks'])) echo $ro ['marks']?>"><br>
	Enter marks2<input type="text" name="p" value="<?php if(!empty ($ro['marks2'])) echo $ro ['marks2']?>"><br>
	<input type="submit" name="save" value="submit">
</form>
<table border="2" width="80%">
	<tr>
		<th>id</th>
		<th>name</th>
		<th>marks</th>
		<th>marks2</th>
		<th>total</th>
		<th>percentage</th>
		<th>delete</th>
		<th>edit</th>
	</tr>
	<?php
	if (!empty($_GET['s'])) 
	{
		$ss=$_GET['s'];
		$query="select * from st where name like '%$ss'";
	}
	else
	{
		$query="select * from st";
	}
		// $query="select * from st";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result))
		{

		$total=$row['marks']+$row['marks2'];
	?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['marks']?></td>
		<td><?php echo $row['marks2']?></td>
		<td><?php echo $total?></td>
		<td><?php echo $total/200*100;?></td>
		<td><a href="newforms.php?did=<?php echo $row['id'] ?>">Delete</a></td>
		<td><a href="newforms.php?eid=<?php echo $row['id'] ?>">Edit</a></td>

	</tr>
	<?php }
	?>
</table>
<br></br><br>
<form>
	Enter name<input type="text" name="s"><br>
	<input type="submit" name="search.....">
</form>