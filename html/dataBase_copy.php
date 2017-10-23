<?php
	include "config.php";
		
	//Input data parsing
	/*$method=$_SERVER['REQUEST_METHOD'];//Request method
	$request=explode('/',trim($_SERVER['PATH_INFO'],'/'));
	$data=file_get_contents('php://input');//Request data
	$input=json_decode($data,true);*/
	
	//arg_message/$key1/$key2
	/*$key1=array_shift($request);
	$key2=array_shift($request);*/
	
	//echo $method." ".$key1." ".$key2;
	
	//Navigation
	switch ($method){
		case "GET":
			echo "get";
			break;
		case "PUT":
			if ($key1==="createDataBase")
				createDataBase();
			break;
		default:
			echo "Bad request";
	}
	
	//Methods -----------------------------------------
	
	//Create data base and tables ----------------------------------------
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
			echo "Database created successfully";
		}
		else{
			echo "Error creating database: ".$conn->error;
		}
		//Create tables
		$name=$GLOBALS['panelTableName'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		$sql="CREATE TABLE myTable(
			makerId INT(20) NOT NULL,
			productWarrantyId INT(20) NOT NULL,
			outPutWarrantyId INT(20) NOT NULL,
			checkedQualityId INT(20) NOT NULL,
			voltageOfMaximumPowerId INT(20) NOT NULL,
			maximumPowerId INT(20) NOT NULL,
			moduleEfficiencyId INT(20) NOT NULL,
			panelHeightId INT(20) NOT NULL,
			panelWidthId INT(20) NOT NULL,
			panelThicknessId INT(20) NOT NULL,
			panelWeightId INT(20) NOT NULL,
			frameId INT(20) NOT NULL,
			frameColorId INT(20) NOT NULL,
			cableId INT(20) NOT NULL,
			caption INT(20) NOT NULL,			
			imageURL1 VARCHAR(20) NOT NULL,
			price1 VARCHAR(20) NOT NULL,
			price2 VARCHAR(20) NOT NULL
		)";
		if ($conn->query($sql)===TRUE){
			echo "Table created successfully";
		}
		else{
			"Error creating table: ".$conn->error;
		}
		$conn->close;
	}	
		
?>