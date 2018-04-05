<?php

	include_once("eventCalendarFunctionsStart.php");
	header('Content-Type: application/json');		// not necessary but recommended -- "Tells browser I'm sending you JSON"
	if (isset($_GET['date']))
	{
		$date = $_GET['date'];
		echo displayEventsJSON($date);
	}
	else
		echo displayEventsJSON();
?>