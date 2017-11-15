let path="photoes";
let pathImage=captionImage="";
let imageId="";

//Module configuration
let configration={
	
};

//Run this module
function loadImageStart(id){
	imageId=id;
	$("#imageLoader").fadeIn();
	$("#hover").fadeIn();
	pathImage=captionImage="";
	readStructure(path);
}

//Cancel
function loadImage_cancel(){
	$("#imageLoader").fadeOut();
	$("#hover").fadeOut();
}

//OK
function loadImage_ok(){
	if (pathImage=="")
		alert ("Виберіть фортографію");
	else{
		$("#imageLoader").fadeOut();
		$("#hover").fadeOut();
		//Add slected image to the document
		$("#image1").empty();
		$("#image1").append("<img src="+pathImage+" alt='selectedPhoto'><div>"++"<div>");
	}
}

//Select image
function imageSelect(element){
	let img=element.getElementsByClassName("photos-list-image")[0];
	$(".photos-list-image").removeClass("imageSelected");
	$(img).addClass("imageSelected");
	pathImage=$(img).attr("src");
}

function makeStructure(array){
	$("#photos").html("<ul class='photos-list'></ul>");
	array.forEach(function(element){
		if (element!=".")
			if (element==="..")
				$(".photos-list").append("<li class='photos-list-element' onclick='back()'>"+element+"</li>");
			else{
				let res=elementComprehending(element);
				if (res==="image"){
					//Add image & its caption to the photos list
					let imageURL="../"+path+"/"+element;
					$(".photos-list").append("<li class='photos-list-imageOuter' onclick='imageSelect(this)'><img class='photos-list-image' src='"+imageURL+"' alt='image'><div class='photos-list-caption'>"+element+"</div></li>");
				}
				else{
					$(".photos-list").append("<li class='photos-list-element' onclick='ahead(this)'>"+element+"</li>");
				}
				}
	});
}

//Catch events
function back(){
	let pos=path.lastIndexOf("/");
	if (pos>0){
		path=path.slice(0,pos);
		readStructure(path);
	}
}
function ahead(arg){
	let value=arg.innerHTML;
	//Is it image or file or folder?
	let res=elementComprehending(value);
	switch (res){
		case "image":
		break;
		case "file":
		break;
		case "folder":
			pathImage=captionImage="";
			path+="/"+value;
			readStructure(path);
		break;
	}
}

//Create and show breadcrumb
function breadcrumbBuild(path){
	breadcrumb=[];
	breadcrumb=path.split("/");
	$("#breadcrumb").empty();
	breadcrumb.forEach(function(element){
		$("#breadcrumb").append("<li><a href='#'>"+element+"</a></li>");
	});
}

//Read data from server
function readStructure(path){
	ajax("GET","imageLoader/scanDir.php/"+path,"",function(callBack){
		if (callBack.success){
			i=callBack.message;
			let array=JSON.parse(callBack.message);
			makeStructure(array);
			//Make breadcrumb
			breadcrumbBuild(path);
		}
	});
}

//Element comprehending 
function elementComprehending(value){
	let res="";
	let pos=value.lastIndexOf(".");
	let ext=value.slice(pos+1,value.length);
	if (pos>0){
		if (ext==="jpg" || ext==="JPG" || ext==="png" || ext==="PNG" || ext==="gif" || ext==="GIF"){
			res="image";
		}
		else{
			res="file";
		}
	}
	else{
		res="folder";
	}
	return res;
}