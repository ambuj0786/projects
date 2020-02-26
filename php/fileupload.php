<?php
	if (!empty($_POST['save']))
	{
		$filepath=$_FILES['n']['tmp_name'];
		$newname=date('dmys');
		move_uploaded_file($filepath,"images/".$newname.".jpg");
	}
 ?>
<form method="post" enctype="multipart/form-data">
	<br><br><br><br>
	Upload file<input type="file" name="n"/><br>
	<input type="submit" name="save"/>
</form>
