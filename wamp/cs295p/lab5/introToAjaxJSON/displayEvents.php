<?php

	include_once("eventCalendarFunctionsStart.php");
	if (isset($_GET['date']))
	{
		$date = $_GET['date'];
		displayEvents($date);
	}
	else
		displayEvents();
?>