$(document).ready(function(){
	
	let inputData=null;
	let panelItemName=["makerId","productWarrantyId","outPutWarrantyId","checkedQualityId","voltageOfMaximumPowerId","maximumPowerId","moduleEfficiencyId","panelHeightId","panelWidthId","panelThicknessId","panelWeightId","frameId","frameColorId","cabelId","caption","imageURL1","price1","price2"];
	
	//Read patterns from data base
	ajax("GET","dataBase_solarPanels.php/panel",function(response){
		if (response.success)
			panelItemName=response.
	});
	
	/* Tools events */
	//Add new panel to the table
	$("#toolsAddPanel").click(function(){
		$("#addPanel.input").fadeIn();
		inputData=document.getElementById("addPanel").querySelectorAll(".inputItem");
		let json=JSONCreate(panelItemName,inputData);
		ajax("PUT",json,function(response){
			console.log(response);
		});
	});
		
});

//JSON create
function JSONCreate(itemName,itemValue){
	let json={};
	let i=0;
	for (i=0; i<itemName.length; i++){
		let index=itemName[i];
		json[index]=itemValue[i].value;
	}
	json=JSON.stringify(json);
	return json;
}