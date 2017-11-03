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
	
});