<?php
	include "../config.php";
	//Manipulation with "solar panels tables"
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
			echo "GET";
			break;
		case "PUT":
			echo "PUT";
			break;
		case "POST":
			if ($key1==="solarPanel"){
				//Updating 'solar panel table'
				$obj=json_decode($_POST['json'],true);
				//print_r($obj);
				solarPanelUpdate($obj);
			}
			else
				echo "Not POST";
			break;
		default:
			echo "Bad request";
	}
	
	// Bad request
		//echo "Bad request";
		//serverStatus(400);
	
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