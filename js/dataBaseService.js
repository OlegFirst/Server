//var variable=null;
// Method PUT/GET/POST/DELETE
function ajax(method,msg,callBack){
	var request=new XMLHttpRequest();
	let res={};
	request.onreadystatechange=function(){
		//If OK
		if (request.readyState==4 && request.status==200){
			console.info(request.responseText);
			res.message=request.responseText;
			res.success=true;
			callBack(res);
		}
		//If ERROR
		if (request.readyState==4){
			statusParser(request.status);
			res.message="Error";
			res.success=false;
			callBack(res);
		}
	}
	//Send request to server
	switch (method){
		case "GET":
			request.open("GET",msg,true);
			request.send();
		break;
		case "PUT":
			request.open("PUT","dataBase_solarPanels.php/1/2",true);
			request.send();
	}
}

//Error parser
function statusParser(requestStatus){
	switch (requestStatus){
		case 200:
			console.info("200");
		break;
		case 400:
			console.error("400");
		break;
		default:
			console.error("default");
	}
}