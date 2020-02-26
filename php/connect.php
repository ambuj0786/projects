<?php
	
	$connect=mysqli_connect("localhost","root","","mydb")or failed("connection_failed");

	if(!empty($_GET['save']))
	{
		$na=$_GET['n'];
		$ma=$_GET['m'];
		if(empty($na) || empty($ma)){
			$message = "enter both value";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		if(!empty($_GET['editid']))
		{
			$id=$_GET['editid'];
			$query="update sm set name='$na', marks='$ma' where id=$id";
		}else{
			$query="insert into sm(name,marks)value('$na',$ma)";
		}

		if(mysqli_query($connect,$query))
		{
			echo "record inserted ";

		}
		else
		{
			echo "record  not inserted ";


		}
	}
	if (!empty($_GET['did']))
 	{
 		$id=$_GET['did'];
 		$query="delete from sm where id=$id";
 		if(mysqli_query($connect,$query))
 		{
 			echo" record inserted ";
 		}
 		else
 		{
 			echo"record not inserted";
 		}
	}
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from  sm where id =$id";
		$result=mysqli_query($connect,$query);
		$ro=mysqli_fetch_assoc($result);
	}
?>
<form>
	<input type="hidden" name="editid" value="<?php if(!empty($ro['id'])) echo $ro['id'] ?>"/>
	Enter name<input type="text" name="n" value="<?php  if(!empty($ro['name'])) echo $ro['name']?>"><br>
	Enter marks<input type="text" name="m" value="<?php  if(!empty($ro['marks'])) echo $ro['marks']?>"><br>
	<input type="submit" name="save" value="submit">
</form>

<table border="2" width="70%">
	
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Marks</td>
		<td>delete</td>
		<td>edit</td>
	</tr>

	<?php

		$query="SELECT * FROM sm WHERE marks > 50 AND name='rajat'";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result))
		{

	?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['marks'] ?></td>
		<td><a href="connect.php?did=<?php echo $row['id']?>">delete</a></td>
		<td><a href="connect.php?eid=<?php echo $row['id']?>">edit</a></td>
		
	</tr>
	<?php } ?> 

</table>