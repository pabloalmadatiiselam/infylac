$(document).ready(main);

function main()
{
	if (screen.width <= 480)
	{ 
		$('#menu').hide();
		$('#menubar').click(function(){
			$('#menu').toggle();
		});
	}
	/*
	$('#menubarpie').click(function(){
		$('.menupie').toggle();
	});
*/
}