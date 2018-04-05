window.onload = setupPage;

function setupPage()
{
	var anchors = document.getElementsByTagName("a");
	for (var i = 0; i < anchors.length; i++)
	{
		if (anchors[i].className == "hasEvents")
		{
			anchors[i].onmouseover = displayEvents;
			anchors[i].onmouseout = clearEvents;
			anchors[i].onclick = cancelClick;
		}
	}
}

function clearEvents()
{
	var eventsDiv = document.querySelectorAll("div#events")[0];
	eventsDiv.innerHTML = "";
}

function cancelClick()
{
	return false;
}

function displayEvents()
{
	var eventsDiv = document.querySelectorAll("div#events")[0];
	eventsDiv.style.position = "absolute";
	eventsDiv.style.top = "500px";
	eventsDiv.style.left = "300px";
	eventsDiv.style.backgroundColor = "white";
	/* The part of the code that makes the ajax call is MUCH easier in JQuery than in JavaScript.
	Find the div tag that is styles with the class events.
	The method load makes an ajax call.  In this example the page we want to load is given
	in the href attribute of the anchor tag.  The date will be part of the href attribute as well.
	Remember that you wrote code that created the anchor tag with an href attribute that
	references the php page called displayEvents with the date as part of the url.
	*/
	doEventsJSON(this.href);
	
}

function doEventsJSON(url){		
		// get details from web service
		$.getJSON(
			// url
			url, 
			// handler
			function(events){
				// populate the HTML table
				//var eventsDiv = document.querySelectorAll("div#events")[0];
				//eventsDiv.innerHTML = events;
				$.each(events, function(i, event) {
					$("div#events").append(
						"<p><strong>" + event.title + "</strong>: " + event.description + "</p>");
				});	
			}
		);
}