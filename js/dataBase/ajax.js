$(document).ready(function(){

	json='[{"id":"model","value":"a"},{"id":"makerId","value":2},{"id":"manufacturerId","value":1}]';
	ajax("POST","dataBase.php/solarPanel",json,function(callBack){
		console.log(callBack);
	});

});
	
	function ajax(method,link,msg,callBack){
		let res={};
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
	}
//});