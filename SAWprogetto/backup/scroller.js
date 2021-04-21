
//Chiamo 5 post alla volta
var start = 0;
var limit = 5;
var reachedMax = false;
//ise l'utente è in fondo chiama getData()
$(window).scroll(function () {
	if ($(window).scrollTop() == $(document).height() - $(window).height())
		getData();
});

//Chiama getData() all'inizio
$(document).ready(function ()
{
	getData();
});

function getData()
{
	if(reachedMax)
		return;
	//Chiamata Ajax a data.php
	$.ajax({
		url: 'data.php',
		method: 'POST',
		dataType: 'text',
		data: {
			getData: 1,
			start: start,
			limit: limit
		},
		success: function(response)
		{
			if (response == "reachedMax")
				reachedMax = true;
			else
			{
				start += limit;
				$(".results").append(response);
			}
		}

	});
}
