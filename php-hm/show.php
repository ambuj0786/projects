<?php
	
	// Simple function
	function show()
	{
		echo "<br/>";
		echo "Show function";
		echo "<br/>";
	}

	show();
	show();

	// function with parameter
	function add($a,$b)
	{
		echo "<br/>";
		$c=$a+$b;
		echo $c;
		echo "<br/>";
	}

	add(10,20);
	add(30,40);

	// function with parameter & return value
	function add1($a,$b)
	{
		echo "<br/>";
		$c=$a+$b;
		return($c);
		echo "<br/>";
	}

	$d=add1(100,200);
	$d=$d+100;
	echo $d;

?>