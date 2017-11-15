$(document).ready(function(){
		
	// Navigation -----------------------------------
	var pathName=window.location.pathname;
	switch (pathName){
		case "/Server/modules/home.php":
			$("#itemHome").addClass('active');
		break;
		case "/Server/modules/page1.php":
			$("#itemPage1").addClass('active');
		break;
	}
	
	// 'workInformation' controller. Hide messages
	$(".event_workInformationClose").click(function(){
		$("#workInformation").fadeOut();
		$(".workInformation-info").fadeOut();
	});
	
});

// 'workInformation' controller ------------------------------------------------
// arg_ msg, "info"/"warning"
// Show messages
// Hiding occurs when 'event_workInformationClose'-class is clicked
function workInformationShow(msg,info){
	$("#workInformation").fadeIn();
	switch (info){
		case "info":
			document.querySelector(".workInformation-info").innerHTML=msg;
			$(".workInformation-info").fadeIn();
		break;
		case "warning":
			document.querySelector(".workInformation-warning").innerHTML=msg;
			$(".workInformation-warning").css("display","block");
			setTimeout(function(){
				$(".workInformation-warning").fadeOut();
			},3000);
		break;
		default:
			console.error("javascript.js-file bad function argument");
	}
	
}

//Load and show image
var openFile=function(event,target){
	let input=event.target;
	let imageId=event.target.classList[0];
	imageId=imageId.slice(9,imageId.length);
	
	console.log(imageId);
	
	let reader=new FileReader();
	
	reader.onload=function(){
		let dataURL=reader.result;
		let ouput=document.getElementById(imageId);
		console.log(dataURL,ouput);
		ouput.src=dataURL;
	}	
	reader.onloadend=function(){
		preview.src=reader.result;
	}
	if (file)
		reader.readAsDataURL(file)
	//reader.readAsDataURL(input.files[0]);
}