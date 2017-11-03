//Show data base errors with project events

//Error parser
function statusParser(requestStatus){
	switch (requestStatus){
		case 400:
			console.error("400, Bad request");
			statusShow("Bad request");
		break;
		case 404:
			console.error("404, Not found");
			statusShow("Not found");
		break;
		case 408:
			console.error("408, Request timeout");
			statusShow("Request timeout");
		break;
		case 500:
			console.error("500, Internal server error");
			statusShow("Internal server error");
		break;
		case 503:
			console.error("503, Service unavailable");
			statusShow("Service unavailable");
		break;
		default:
			console.error("default");
	}
}

function statusShow(msg){
	$(".message-error").text(msg);
	$("#messageError").fadeIn();
	//Page tools hide
	$(".section-tools button").attr("disabled","false");
}

$(document).ready(function(){});