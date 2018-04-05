<?php

	include("eventCalendarFunctionsStart.php");
	if (isset($_GET['date']))	// If the GET array has a value in it...
	{
		$date = $_GET['date'];	// then get that value...
		displayEvents($date);	// and use that value to call the function displayEvents...
	}
	else
		displayEvents();		// otherwise call displayEvents and pass today's date.
?>