let panelCollection=[];

//Input solar panel ----------------------------------------------------

//Get selected item parameter
function solarPanels_dropdown(arg){
	let className=arg.className;
	let button=arg.parentNode.parentNode.parentNode;
	button=button.getElementsByTagName("button")[0];
	$(button).text(arg.text);
	//Change button id as an element id
	let id=$(button).attr("id");
	let pos=id.indexOf("_");
	if (pos!=-1)
		id=id.slice(0,pos);
	id=id+"_"+className;
	$(button).attr("id",id);
}
//Input solar panel. "OK" is clicked.
function solarPanels_OK(){
	panelCollection=[];
	//Get data from table
	let table=document.querySelector("#addPanel");
	items=table.getElementsByClassName("item");
	let isValid=true;
	for (let i=0; i<items.length; i++){
		let item=items[i];
		let id="#"+$(item).attr("id");
		let value=$(id).val();
		let text=$(id).text();
		let res=null;
		if (value=="")
			res=text;
		else
			res=value;
		if (res==="Dropdown" || res===""){
			res="empty";
			isValid=false;
		}
	}
	if (!isValid)
		alert("Усі поля мають бути заповнені");
	else{
		//Table clones
		/*table=document.querySelector("#solarPanelTable");
		let cln=table.cloneNode(table);
		document.getElementsByClassName("solarPanel-main")[0].appendChild(cln);
		let tables=document.getElementsByClassName("solarPanelTable");
		table=tables[tables.length-1];
		$(table).attr("id","solarPanelTable1");
		$(table).removeClass("solarPanelTable");
		$(table).addClass("solarPanels");*/
		//Show/hide
		$(".solarPanels").fadeIn();
		$("#addPanel").fadeOut();
		//Creating model
		let id=item=itemId=value="";
		for (let i=0; i<items.length; i++){
			item=items[i];
			id="#"+$(item).attr("id");
			let value=$(id).val();
			let text=$(id).text();
			if (value=="")
				value=text;
			//Element id parsing
			id=id.replace("#","");
			let pos=id.indexOf("_");
			if (pos!=-1){
				itemId=id.slice(0,pos);
				value=+id.slice(pos+1,id.length);				
			}
			else
				itemId=id;
			let panel=new Panel(itemId,value);
			panelCollection.push(panel);
		}
		let json=JSON.stringify(panelCollection);
		//json='[{"id":"model","value":"a"},{"id":"makerId","value":2},{"id":"manufacturerId","value":1}]';
		console.log(json);
		//Add table to data base
		ajax("POST","dataBase.php/solarPanel",json,function(callBack){
			console.log(callBack);
		});
	}
}
function solarPanels_cancel(){
	//Show/hide
	$(".solarPanels").fadeIn();
	$("#addPanel").fadeOut();
}

//Creating new solar panel ----------------------------------------------------------
function solarPanels_panelCreate(){
	//Fields clear
	/*table=document.querySelector("#addPanel");
	items=table.getElementsByClassName("item");
	for (let i=0; i<items.length; i++){
		let id="#"+$(items[i]).attr("id");
		$(id).val("");
	}*/
	//Show/hide
	$(".solarPanels").fadeOut();
	$("#addPanel").fadeIn();	
}