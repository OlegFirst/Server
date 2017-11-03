let panelPattern=[], filterPattern=[], dimension=[], value=[];

$(document).ready(function(){
	
	//Read patterns from data base
	//Read panel pattern
	ajax("GET","dataBase_solarPanels.php/panel",function(response){
		if (response.success){
			panelPattern=JSON.parse(response.message);
		}
		else
			//Show error
			$(".message-content").text("Таблиця із зразком панелей не знайдена");
	});
	//Read filter pattern
	//ajax("GET","dataBase_solarPanels.php/filter",function(response){
		//if (response.success)
			//console.log("Read filter OK");
	//});
	//Read goods dimensions
	ajax("GET","dataBase_solarPanels.php/dimension",function(response){
		if (response.success){
			dimensiotn=JSON.parse(response.message);
		}
		else{
			//Show error
			$(".message-content").text("Не прочитані розмірності");
		}
	});
	
	ajax("GET","dataBase_solarPanels.php/value",function(response){
		if (response.success){
			value=JSON.parse(response.message);
		}
		else{
			//Show error
			$(".message-content").text("Не прочитані значення");
		}
	});
	
	/* Tools events */
	
	//Add new panel to the table
	$("#toolsAddPanel").click(function(){
		$("#addPanel.input").fadeIn();
		//inputData=document.getElementById("addPanel").querySelectorAll(".inputItem");
		//let json=JSONCreate(panelItemName,inputData);
		/*ajax("PUT",json,function(response){
			console.log(response);
		});*/
	});
	$("#addPanel .ok").click(function(){
		//Get data from input table
		let inputs=document.getElementsByClassName("inputItem");
		console.log(inputs);
		for (let i=1; i<inputs.length; i++){
			let value=inputs[i].value;
			console.log(value);
		}
	});
	$("#addPanel .cancel").click(function(){
		$("#addPanel.input").fadeOut();
	});
	
	//Panels pattern shows
	$("#toolsPanelPattern").click(function(){
		//Check if exist
		if (document.getElementById("panelPattern")==null){
			//Creating table parameters
			let tableContent={
				"thead": ["goods_solarPanel"],
				"tbody": panelPattern
			};
			tableCreate(tableContent,"panelPattern");
		}
	});
	
	//Filter pattern shows
	$("#toolsFilterPattern").click(function(){
		if (document.getElementById("filterPattern")==null){
			//Create filter pattern
			panelFilter_pattern();
			//Create table
			let tableContent={
				"thead": ["filter_solarPanel"],
				"tbody": filterPattern
			};
			panelPilter_tableCreate(tableContent,"filterPattern");
		}
	});
		
});

//JSON create
function JSONCreate(itemName,itemValue){
	console.log(itemName);
	console.log(itemValue);
	let json={};
	let i=0;
	for (i=0; i<itemName.length; i++){
		let index=itemName[i];
		json[index]=itemValue[i].value;
	}
	json=JSON.stringify(json);
	return json;
}