$(document).ready(function(){
		
	// Navigation -----------------------------------
	var pathName=window.location.pathname;
	switch (pathName){
		case "/Server/modules/home.php":
			$("#itemHome").addClass('active');
		break;
		case "/Server/modules/page1.php":
			$("#itemPage1").addClass('active');
		break;
	}
	
});

// Table create
function tableCreate(content,tableId){
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
		$(td2).text(content.tbody[i].id);
	}
	
	//Table remove
	$(".table-close").click(function(){
		let table=this.parentNode;
		$(table).remove();
	});
}