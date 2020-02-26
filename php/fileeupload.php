<?php
	if (!empty($_POST['save']))
	{
		$name=$_POST['na'];
		$filename=$_FILES['n']['name'];
		$filepath=$_FILES['n']['tmp_name'];
		$ext=end(explode(".",$filename));
		$query="show table status like 'img'";
		$re=mysqli_query($connect,$query);
		$r=mysqli_fetch_assoc($re);
		$id=$r['Auto_increment'];
		$fullfilename=$id.".".$ext;
		$query="insert into images(name,filename) value ('$name','$fullfilename')";
		if(mysqli_query($connect,$query))
		{
			echo "record insertd ";
			move_uploaded_file($filepath,"images/".$newname.".jpg");
		}
		else
		{
			echo "result not inserted ";
		}
	}
 ?>
<form method="post" enctype="multipart/form-data">
	<br><br><br>
	Enter name<input type="text" name="na"></br>
	Upload file<input type="file" name="n"/><br>
	<input type="submit" name="save"/>
</form>
