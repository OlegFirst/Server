// PANEL FILTER	

//Create pattern array
function panelFilter_pattern(){
	filterPattern=[];
	filterPattern.push({
		"name": panelPattern[0].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[1].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[3].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[4].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[5].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[6].name,
		"value": ["value1","value2","value3"]
	});
	//Creating table parameters
	let tableContent={
		"thead": ["filter_solarPanel"],
		"tbody": filterPattern
	};
	filterPattern.push({
		"name": panelPattern[7].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[8].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[9].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[11].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[12].name,
		"value": ["value1","value2","value3"]
	});
	filterPattern.push({
		"name": panelPattern[13].name,
		"value": ["value1","value2","value3"]
	});	
}

// Panel filter table create
function panelPilter_tableCreate(content,tableId){
	console.log(content);
	//Creating table
	let main=document.getElementsByTagName("main")[0];
	let table=document.createElement("table");
	let thead=document.createElement("thead");
	let tr=document.createElement("tr");
	main.appendChild(table);
	table.appendChild(thead);
	thead.appendChild(tr);
	$(table).addClass("table table-bordered");
	$(table).attr("id",tableId);
	let button=document.createElement("button");
	table.appendChild(button);
	$(button).addClass("table-close close");
	$(button).text("X");
	//Creating table head
	let index=null;
	for (index in content.thead){
		let th=document.createElement("th");
		tr.appendChild(th);
		$(th).text(content.thead[index]);
		$(th).addClass("text-center info");
		$(th).attr("colspan","2");
	}
	//Creating table body
	let tbody=document.createElement("tbody");
	table.appendChild(tbody);
	for (i=0; i<content.tbody.length; i++){
		tr=document.createElement("tr");
		tbody.appendChild(tr);
		let td1=document.createElement("td");
		let td2=document.createElement("td");
		tr.appendChild(td1);
		tr.appendChild(td2);
		$(td1).text(content.tbody[i].name);
		$(td2).text(content.tbody[i].value[0]);
	}
}