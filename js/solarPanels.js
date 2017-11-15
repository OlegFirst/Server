let panelCollection=[]; let i=i1=null;

//Read and show all solar panels
$(document).ready(function(){
	/*ajax("GET","dataBase.php/solarPanelGetAll","",function(callBack){
		if (callBack.success){
			solarPanels_start(JSON.parse(callBack.message));
		}
		else
			alert("Solar panel get error");
	});*/
	
	/*ajax("GET","dataBase.php/solarPanelLast","",function(callBack){
		if (callBack.success){
			//console.log(callBack.message);
			solarPanels_showTable(JSON.parse(callBack.message));
		}
		else
			alert("Solar panel get error");
	});*/
	
	$(".targetId-image1").eq(0).trigger("click");
	
	//Messenger ---------------------
	//Message shows
	$(".solarPanel-section-tools>button").click(function(){
		let msg="";
		switch (this.id){
			case "toolsAddPanel":
				msg="Додати нову панель";
			break;
			case "toolsRemovePanel":
				msg="Виберіть панель для видалення";
			break;
			case "toolsEditPanel":
				msg="Виберіть панель для редагування";
			break;
			case "toolsPanelPattern":
				msg="Зразок панелей";
			break;
			case "toolsFilterPanel":
				msg="Фільтр";
			break;
		}
		workInformationShow(msg,"info");
	});
	
});

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
	if (!isValid){
		workInformationShow('Усі поля мають бути заповнені',"warning");
	}	
	else{
		//Show/hide
		$(".solarPanels").fadeIn();
		$("#addPanel").fadeOut();
		$(".event_workInformationClose").trigger('click');
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
		//Add table to data base
		ajax("POST","dataBase.php/solarPanel",json,function(callBack){
			console.info(callBack);
			if (!callBack.success){
				//Update showing solarPanel tables
				ajax("GET","dataBase.php/solarPanelLast","",function(callBack){
					if (callBack.success){
						solarPanels_showTable(JSON.parse(callBack.message));
					}
					else
						alert("Solar panel get error");
				});
			}
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

//Page start. Show solar panel from the data base
function solarPanels_start(tablesDataArray){
	let n=0;
	tablesDataArray.forEach(function(tablesData){
		//Table clones
		table=document.querySelector("#solarPanelTable");
		let cln=document.querySelector("#solarPanelTable").cloneNode(table);
		//Cloned table preparation
		document.getElementsByClassName("solarPanel-main")[0].appendChild(cln);
		let tables=document.getElementsByClassName("solarPanelTable");
		table=tables[tables.length-1];
		n=tablesData[0].itemValue;
		$(table).attr("id","solarPanelTable"+n);
		$(table).removeClass("solarPanelTable");
		$(table).addClass("solarPanels");
		let th=table.getElementsByClassName('info')[0].children[0];
		th.innerHTML=th.innerHTML+" #"+n;
		//Fill in the cloned table
		let tBody=table.tBodies[0];
		tablesData.forEach(function(element){
			if (element.itemName!=="id"){
				let item="<tr><td>"+element.itemTranslate+"</td><td>"+element.itemValue+"</td></tr>";
				$(tBody).append(item);
			}
		});
	});
}

//Show table has already inserted to data base
function solarPanels_showTable(tableData){
	let n=0;
	//New table clones
	let table=document.querySelector("#solarPanelTable");
	let cln=document.querySelector("#solarPanelTable").cloneNode(table);
	//Cloned table preparation
	document.getElementsByClassName("solarPanel-main")[0].appendChild(cln);
	let tables=document.getElementsByClassName("solarPanelTable");
	table=tables[tables.length-1];
	n=tableData[0].itemValue;
	$(table).attr("id","solarPanelTable"+n);
	$(table).removeClass("solarPanelTable");
	$(table).addClass("solarPanel");
	let th=table.getElementsByClassName("info")[0].children[0];
	th.innerHTML=th.innerHTML+" #"+n;
	//Fill in the cloned table
	let tBody=table.tBodies[0];	
	tableData.forEach(function(element){
		let item="<tr><td>"+element.itemTranslate+"</td><td>"+element.itemValue+"</td></tr>";
		$(tBody).append(item);
	});
}

//Solar panel remove ---------------------------------------
function solarPanels_panelRemove(){
	//alert("Виберіть таблицю для видалення");
	//Preparation for removing
	$(".solarPanels").addClass('remove');
}
function solarPanels_tableClicked(arg){
	let str=arg.id;
	let id=str.replace("solarPanelTable","");
	ajax("DELETE","dataBase.php/solarPanel/"+id,"",function(callBack){
		if (callBack.success){
			console.info(callBack.message);
			//Remove table
			console.log("#"+str);
			$("#"+str).remove();
			$(".solarPanels").removeClass('remove');
		}
		else{
			alert("Solar panel delete error");
			console.error(callBack.msg);
		}
	});
}

//Input table. Insert new photo to the panel -----------------------------------------------------
function solarPanels_imageOK(){
	let obj=document.getElementById("file1");
	i=obj;
	if (obj==null){
		//console.error("empty file");
	}
	else
		if ('files' in obj){
			if (obj.files.length==0)
				//If no one image has been selected
				console.error("error");
			else{
				//Get file parameters
				let file=obj.files[0];
				let fileName=file.name;
				//File extension validation
				let i=fileName.indexOf('.')+1;
				let ext=fileName.slice(i,fileName.length);
				console.log(fileName,ext);
				if (ext==="jpg" || ext==="JPG" || ext==="png" || ext==="PNG" || ext==="gif" || ext==="GIF"){
					//Everything is OK
					console.log("OK");
					imageLoad(fileName,"#output");
				}
				else{
					console.error("Extension error");
				}
			}
		}
}

function solarPanels_loadPhoto(){
	loadImageStart("image1");
}