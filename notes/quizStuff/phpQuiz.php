/* Write a PHP function called isOdd that takes one parameter that represents an integer and returns true when the integer is odd and false when the integer is even. 
Test your function by calling it with 2 and 3 as parameters. */

<?php
	function isOdd($num)
	{
		if($num % 2 == 1)
			return true;
		else
			return false;
	}

	echo isOdd(2);
	echo isOdd(3);
?>