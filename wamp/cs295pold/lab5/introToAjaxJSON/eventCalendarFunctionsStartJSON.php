<?php

	$events = array (
				array(	'eventId'=>1,
						'userId'=>1,
						'date'=>strtotime("2016-05-02 00:00:00"),
						'title'=>"Classic Cinema: Wings",
						'description'=>"<p>Wings is a 1927 silent film about two World War I fighter pilot friends, both involved with the same beauty, produced by Lucien Hubbard, directed by William A. Wellman and released by Paramount Pictures. Wings was the first film to win the Academy Award for Best Picture, and the one of two silent film to do so (The Artist being the other).[4] Wings stars Clara Bow, Charles \"Buddy\" Rogers, and Richard Arlen. Gary Cooper appears in a role which helped launch his career in Hollywood and also marked the beginning of his affair with Clara Bow.[5]</p><p>The film, a war picture, was rewritten to accommodate Clara Bow, as she was Paramount's biggest star, but wasn't happy about her part: \"(Wings is)..a man's picture and I'm just the whipped cream on top of the pie\".[6] The film went on to win the first Academy Award for Best Picture at the first annual Academy of Motion Picture Arts and Sciences award ceremony in 1929.</p><p>The film was re-released to Cinemark theaters for a limited run in May 2012.</p>"),
				array(	'eventId'=>2,
						'userId'=>1,
						'date'=>strtotime("2016-05-03 00:00:00"),
						'title'=>"The Future is Prologue",
						'description'=>"Enter a description of the future is prologue here "),  
				array(	'eventId'=>3,
						'userId'=>2,
						'date'=>strtotime("2016-05-04 00:00:00"),
						'title'=>"American Favorites",
						'description'=>"Enter a description of American Favorites here."), 
				array(	'eventId'=>21,
						'userId'=>2,
						'date'=>strtotime("2016-05-06 00:00:00"),
						'title'=>"CCC Jazz Band",
						'description'=>"Enter a description of CCC Jazz Band here."), 
				array(	'eventId'=>22,
						'userId'=>2,
						'date'=>strtotime("2016-05-06 00:00:00"),
						'title'=>"New Event Title",
						'description'=>"New event description"), 
				array(	'eventId'=>22,
						'userId'=>3,
						'date'=>strtotime("2016-05-09 00:00:00"),
						'title'=>"Wicked",
						'description'=>"<p>(full title: Wicked: The Untold Story of the Witches of Oz) is a musical with music and lyrics by Stephen Schwartz and a book by Winnie Holzman. It is based on the 1995 Gregory Maguire novel Wicked: The Life and Times of the Wicked Witch of the West, a parallel novel of the 1939 film The Wizard of Oz and L. Frank Baum's classic story The Wonderful Wizard of Oz. The musical is told from the perspective of the witches of the Land of Oz; its plot begins before and continues after Dorothy's arrival in Oz from Kansas and includes several references to the 1939 film and Baum's novel. Wicked tells the story of two unlikely friends, Elphaba (the Wicked Witch of the West) and Glinda (the Good Witch of the North), who struggle through opposing personalities and viewpoints, rivalry over the same love-interest, reactions to the Wizard's corrupt government, and, ultimately, Elphaba's public fall from grace.</p>")
			);
			
	function displayEventTitleOnly($event)
	{
		echo "<br />";
		echo $event['title'];
	}
	
	function displayEventsTitlesOnly($datestring = null)
	{
		if ($datestring == null)
			$date = mktime(0, 0, 0);
		else if (is_numeric($datestring))
			$date = $datestring;
		else
			$date = strtotime($datestring);
		
		$eventsForDate = getEvents($date);
		foreach ($eventsForDate as $event)
		{
			displayEventTitleOnly($event);
		}
	}
			
	function displayEvent($event)
	{
		echo "<p>";
		echo "<strong>". $event['title'];
		echo ": </strong>";
		echo $event['description'];
		echo "</p>";
	}
	
	function displayEvents($datestring = null)
	{
		if ($datestring == null)
			$date = mktime(0, 0, 0);
		else if (is_numeric($datestring))
			$date = $datestring;
		else
			$date = strtotime($datestring);
		
		echo ("<h3>Event Schedule For ". date("n/j/Y", $date) . "</h3>");
		$eventsForDate = getEvents($date);
		foreach ($eventsForDate as $event)
		{
			displayEvent($event);
		}
	}
	
	function displayEventsJSON($datestring = null)
	{
		if ($datestring == null)
			$date = mktime(0, 0, 0);
		else if (is_numeric($datestring))
			$date = $datestring;
		else
			$date = strtotime($datestring);
		
		$eventsForDate = getEvents($date);
		return json_encode($eventsForDate);
	}
			
	function hasEvents($datestring = null)
	{
		global $events;
		if ($datestring == null)
			$date = mktime(0, 0, 0);
		else if (gettype($datestring) == 'string')
			$date = strtotime($datestring);
		else
			$date = $datestring;
		if (search_2d_array($events, 'date', $date) === false)
			return false;
		else
			return true;
	}
	
	function getEvents($date)
	{
		global $events;
		$eventsForDate = array();
		$index = search_2d_array($events, 'date', $date);
		if ($index === false)
			return $eventsForDate;
		else
		{
			do
			{
				$eventsForDate[] = $events[$index];
				$index++;
			} while ($index < count($events) && $events[$index]['date'] == $date);
			return $eventsForDate;
		}
	}
	
	function search_2d_array($array, $key, $value) {
		for ($i = 0; $i < count($array); $i++)
		{
			if (isset($array[$i][$key])) {
				if ($array[$i][$key] == $value) {
					return $i;
				}
			}	
		}
		return false;
    };
	
	//print_r($events);
	//echo ("4/2 and strtotime " . hasEvents(strtotime("2013-04-02 00:00:00")) . "<br/>");
	//echo ("4/2 " . hasEvents("2013-04-02 00:00:00"). "<br/>");
	//echo ("today's date " . hasEvents(). "<br/>");
	//displayEventsTitlesOnly("2013-04-02 00:00:00");
	//displayEvents();
	//displayEvents("2013-04-02 00:00:00");
	

?>