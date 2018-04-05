<?php

include_once("events.php");

function calendar($dateString = null)	// Default parameter
{

   // Date that the monthly calendar is based on
   if ($dateString == null) 
	   $calDate = time();
   else 
	   $calDate = strtotime($dateString);

   echo("<table id = 'calendar_table'>");
  
   // Write the header row of the calendar table
   writeCalTitle($calDate);

   // Write the row of weekday abbreviations
   writeDayNames();

   // Write the calendar days
   writeCalDays($calDate);
   
   echo("</table>");
}

 function writeCalDays($calendarDay) 
 {
	global $dayEvent;
	
   // Determine the starting day of the month
   $day = mktime(0, 0, 0, 
		date("n", $calendarDay), 
		1,
		date("Y", $calendarDay));
   $weekDay = date("w", $day);

   // Write blank cells preceding the starting day
   echo("<tr>");
   for ($i = 0; $i < $weekDay; $i++) 
   {
      echo("<td></td>");
   }

   // Write cells for each day of the month
   $totalDays = daysInMonth($calendarDay);
   $highlightDay = date("j", $calendarDay);

   for ($i = 1; $i <= $totalDays; $i++) 
   {
      // Move to the next day in the month
      $day = mktime(0, 0, 0, 
			date("n", $calendarDay), 
			$i,
			date("Y", $calendarDay));
      $weekDay = date("w", $day);

      if ($weekDay == 0) echo("<tr>"); // start a new row on Sunday

      // Test if the day being written matches the calendar day
      if ($i == $highlightDay) 
	  {
         echo("<td class='calendar_dates' id='calendar_today'>" . $i . $dayEvent[$i] . "</td>");
      } 
	  else 
	  {
         echo("<td class='calendar_dates'>" . $i . $dayEvent[$i] . "</td>");
      }
      if ($weekDay == 6) echo("</tr>"); // end the row on Saturday
   }
}

function daysInMonth($calendarDay) 
{
   // Array of days in each month
   $dayCount = array(0,31,28,31,30,31,30,31,31,30,31,30,31);

   // Extract the four digit year value from calendarDay
   $thisYear = date("Y", $calendarDay);

   // Extract the month value from calendarDay
   $thisMonth = date("n", $calendarDay);

   // Revise the days in February for leap years
   if ($thisYear % 4 == 0) 
   {
      if (($thisYear % 100 != 0) || ($thisYear % 400 == 0)) 
	  {
         $dayCount[2] = 29;
      }
   }
   
      // Return the number of days for the current month
   return $dayCount[$thisMonth];
}
   
function writeCalTitle($calendarDay) 
{
   /* The calendarDay parameter contains a Date object
      that the calendar is based upon */

   // monthName contains an array of month names
   $monthName = array("", "January", "February", "March", 
       "April", "May", "June", "July", "August", "September",
       "October", "November", "December");

   /* The thisMonth variable contains the calendar month number,
      the thisYear variable contains the 4-digit year value */
   $thisMonth = date("n", $calendarDay);
   $thisYear = date("Y", $calendarDay);

   // Write the table header row of the calendar table
   echo("<tr>");
   echo("<th id='calendar_head' colspan='7'>");
   echo($monthName[$thisMonth] . " " . $thisYear);
   echo("</th>");
   echo("</tr>");
}

function writeDayNames() 
{
   // Array of weekday abbreviations
   $dayName = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");

   // Start a table row of the weekday abbreviations
   echo("<tr>");

   // Loop through the dayName array
   for ($i = 0; $i < count($dayName); $i++) 
   {
      echo("<th class='calendar_weekdays'> " . $dayName[$i] . "</th>");
   }

   // End the table row 
   echo("</tr>");
}

/*
$today = time();
$otherDay = mktime(0, 0, 0, 5, 25, 2016);

echo ("<table>");
writeCalTitle($today);
writeDayNames();
writeCalDays($today);
echo ("</table>");

calendar();
calendar("14 February 2016");
*/

?>