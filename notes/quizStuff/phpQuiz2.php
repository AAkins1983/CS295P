<?php
	function isLeapYear($date)
	{
		return ($date->format('L') == '1');
	}
	
	echo isLeapYear(new DateTime('2014-01-01'));		// Returns false
	echo isLeapYear(new DateTime('2016-02-01'));		// Returns true
?>

