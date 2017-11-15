/*$(document).ready(function(){

	json='[{"id":"model","value":"a"},{"id":"makerId","value":2},{"id":"manufacturerId","value":1}]';
	ajax("POST","dataBase.php/solarPanel",json,function(callBack){
		console.log(callBack);
	});

});*/
	
	function ajax(method,link,msg,callBack){
		let res={};
		switch (method){
			case "POST":
				$.ajax({
					type: 'POST',
					url: link,
					data: {json: msg},
					dataType: 'json'
				})
				.done(function(data){
					console.log(data.responseText);
					res.message="OK";
					res.success=true;
					callBack(res);
				})
				.fail(function(data){
					console.log(data.responseText);
					res.message="Error";
					res.success=false;
					callBack(res);
				});
			break;
			case "GET":
				$.get(link,function(data,status){
					res.message=data;
					res.success=true;
					callBack(res);
				});
			break;
			case "DELETE":
				$.ajax({
					type: 'DELETE',
					url: link,
				})
				.done(function(data){
					res.message=data;
					res.success=true;
					callBack(res);
				})
				.fail(function(data){
					res.message=data;
					res.success=false;
					callBack(res);
				});
			break;
		}		
	}