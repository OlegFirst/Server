//Logging
$(document).ready(function(){
	
	let userLogin="user";
	let userPassword="123";
	console.log(window.location.pathname);
	
	$("#submitButton").click(function(){
		$(".info").css("display","none");
		let login=$("#login").val();
		let password=$("#password").val();
		if (login===userLogin && password===userPassword){
			$("#infoSuccess").css("display","block");
			window.location.pathname="/Server/modules/home.php";
		}
		else{
			$("#infoError").css("display","block");
		}			
	});

});