 <?php
	
	echo "hello to PHP";

	$a=10;
	$b=20;
	$c=$a+$b;
	echo "<br/>The Sum is ".$c;

	if($c==30)
	{
		echo "<br/>Right Guess";
	}
	else
	{
		echo "Wrong Guess";
	}

	$i=1;
	while($i<=10)
	{
		echo $i;
		$i=$i+1;
	}

?>