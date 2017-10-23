$(document).ready(function(){
		
	// Navigation -----------------------------------
	var pathName=window.location.pathname;
	switch (pathName){
		case "/Server/html/home.php":
			$("#itemHome").addClass('active');
		break;
		case "/Server/html/page1.php":
			$("#itemPage1").addClass('active');
		break;
	}
	
	// Input form hide ------------------------------
	$(".input-list-button").click(function(){
		$(".input").fadeOut();
	})
	
	// JSON
		
});