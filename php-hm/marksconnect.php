<?php
	$connect=mysqli_connect("localhost","root","","newdb")or fail("Connection Failed");
	if (!empty($_GET['save'])) 
	{
		$aa=$_GET['a'];
		$ba=$_GET['b'];
		$ca=$_GET['c'];
		$da=$_GET['d'];
		$query="insert into sm (name,marks1,marks2,marks3) values ('$aa',$ba,$ca,$da)";
		if(mysqli_query($connect,$query))
		{
			echo "record inserted";	
		}
		else
		{
			echo "record not inserted";	
		}
	}
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		$query="delete from sm where id =$id";
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
	<!-- ID<input type="text" name="a"/><br/> -->
	Name<input type="text" name="a"/><br/>
	Marks1<input type="text" name="b"/><br/>
	Marks2<input type="text" name="c"/><br/>
	Marks3<input type="text" name="d"/><br/>
	<input type="submit" name="save"/>
</form>
<table border="2" width="30%" >
	<tr>
		<td>ID</td>
		<td>name</td>
		<td>marks1</td>
		<td>marks2</td>
		<td>marks3</td>
		<td>Total</td>
		<td>Percentage</td>
		<td>Delete</td>
	</tr>
	<?php
		if(!empty($_GET['s']))
		{
			$ss=$_GET['s'];
			$query="select * from sm where name like '%$ss%'";
		}
		else
		{
			$query="select * from sm";
		}
		$result=mysqli_query($connect,$query);
		while($new=mysqli_fetch_assoc($result))

		{
		$total= $new['marks1']+$new['marks2']+$new['marks3'];
	?>
	<tr>
		<td><?php echo $new['id']?></td>
		<td><?php echo $new['name']?></td>
		<td><?php echo $new['marks1']?></td>
		<td><?php echo $new['marks2']?></td>
		<td><?php echo $new['marks3']?></td>
		<td><?php echo $total?></td>
		<td><?php echo $total/200*100;?></td>
		<td><a href="marksconnect.php?did=<?php echo $new['id']?>">Delete</a></td>
	</tr>
	<?php }?>
</table>

<br/><br/>
<form>
	Enter Name <input type="text" name="s"/>
	<input type="submit" value="Search..."/>
</form>

