	var slider_current = "1" // Start at slide 1-9
	var slider_refresh = 2000 // Auto slide rate, 1000 = 1 second
	var slider_fade = 500 // Slide change time, 1000 = 1 second

function slider(action) {
	
	switch(action)
	{
		
		case "start":
	
			$('#slider_2').hide()
			$('#slider_3').hide()
			$('#slider_4').hide()
			$('#slider_5').hide()
			$('#slider_6').hide()
			$('#slider_7').hide()
			$('#slider_8').hide()
			$('#slider_9').hide()
			$('#slider_' + slider_current).fadeTo(500, 1)
			$('#slide_link_' + slider_current).fadeTo(0, 1)
			
			slider('autoslide')
		
		break
		
		case "next":
		
				switch(slider_current)
				{
					case "1": var slider_next = "2"; break;
					case "2": var slider_next = "3"; break;
					case "3": var slider_next = "4"; break;
					case "4": var slider_next = "5"; break;
					case "5": var slider_next = "6"; break;
					case "6": var slider_next = "7"; break;
					case "7": var slider_next = "8"; break;
					case "8": var slider_next = "9"; break;
					case "9": var slider_next = "1"; break;
				}
				
				return slider_next;
				
		break
		
		case "previous":
		
				switch(slider_current)
				{
					case "1": var slider_prev = "9"; break;
					case "2": var slider_prev = "8"; break;
					case "3": var slider_prev = "7"; break;
					case "4": var slider_prev = "6"; break;
					case "5": var slider_prev = "5"; break;
					case "6": var slider_prev = "4"; break;
					case "7": var slider_prev = "3"; break;
					case "8": var slider_prev = "2"; break;
					case "9": var slider_prev = "1"; break;
				}
				
				return slider_prev;
				
		break
		
		case "autoslide":
			
			setTimeout("slider('autoslide');slide(slider('next'))", slider_refresh)

		break
		
	}

}

function slide(to) {
	
	$('#slide_link_' + slider_current).fadeTo(0, 0.5)
	$('#slide_link_' + slider_current).hide()
	$('#slide_link_' + to).show()
	$('#slide_link_' + to).fadeTo(0, 1)
	
	//jQuery('#slider_' + slider_current).fadeTo(slider_fade, 0);
	$('#slider_' + slider_current).slideDown(slider_fade).slideUp(slider_fade);
	$('#slider_' + slider_current).hide()
	//$('#slider_' + slider_current).fadeTo(slider_fade, 0)
	//jQuery('#slider_' + to).fadeTo(slider_fade, 1);
	$('#slider_' + to).slideUp(slider_fade).slideDown(slider_fade);
	$('#slider_' + to).show()
	//$('#slider_' + to).fadeTo(slider_fade, 1)

	
	slider_current = to
	
}