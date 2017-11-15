<?php
	include "../config.php";
	//Manipulation with "solar panels"
	//include "solarPanels/solarPanels.php";
	include "solarPanels/dataBase_solarPanels.php";
	//Showing database work
	include "serverStatus.php";
		
	$error=$success="";
	
	$method=$_SERVER['REQUEST_METHOD'];//Request method
	$request=explode('/',trim($_SERVER['PATH_INFO'],'/'));
	$data=file_get_contents('php://input');//Request data
	$input=json_decode($data,true);
	//arg_message/$key1/$key2
	$key1=array_shift($request);
	$key2=array_shift($request);
					
	//Data base create/delete
	if ($_SERVER["REQUEST_METHOD"]==POST && $_POST["dataBase"]==="dataBaseCreate" || $_SERVER["REQUEST_METHOD"]==POST && $_POST["dataBase"]==="dataBaseDelete"){
		if ($_POST["dataBase"]==="dataBaseCreate" && $_POST["password"]===$GLOBALS['dbManipulatePassword']){
			//createDataBase();
			//createSolarPanels();
		}
		if ($_POST["dataBase"]==="dataBaseDelete" && $_POST["password"]===$GLOBALS['dbManipulatePassword']){
			deleteDataBase();
		}
		else{
			$error="Помилка вибору чи невідповідний пасворд";
		}
	}
	
	//Tables create/delete/update
	switch ($method){
		case "GET":
			if ($key1==="solarPanelGetAll"){
				// ($key1==="solarPanel" && strlen($key2)==0)
				//Read all 'solarPanel'
				$solarPanelsAll=readSolarPanelAll();
				echo json_encode($solarPanelsAll);
			}
			if ($key1==="solarPanelLast"){
				//Read last inserted "solarPanel" (has max 'id' in the table)
				$lastId=solarPanel_lastId();
				echo json_encode(readSolarPanel($lastId));
			}
			break;
		case "PUT":
			echo "PUT";
			break;
		case "POST":
			if ($key1==="solarPanel"){
				//Updating 'solar panel table'
				$obj=json_decode($_POST['json'],true);
				solarPanelUpdate($obj);
			}
			else
				echo "Not POST";
			break;
		case "DELETE":
			if ($key1==="solarPanel" && strlen($key2)){
				deleteSolarPanel($key2);
			}
		break;
		default:
			echo "Bad request";
	}
	
	function createDataBase(){
		//Create database
		$name=$GLOBALS['dbName'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password']);
		if ($conn->connect_error){
			header("HTTP/1.1 500 OK");
			echo "Connection error";
			return;
		}
		$sql="CREATE DATABASE $name";
		if ($conn->query($sql)===TRUE){
			echo "
				<div class='alert alert-success'>
					Database created successfully
				</div>
			";
		}
		else{
			echo "
				<div class='alert alert-danger'>
					Error creating database: ".$conn->error.
				"</div>
			";
		}
		$conn->close;
	}	
		
?>