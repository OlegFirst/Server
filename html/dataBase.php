<?php
	include "../config.php";
		
	$error=$success="";
	echo $_POST["dataBase"];
	
	//Form event
	if ($_SERVER["REQUEST_METHOD"]==POST){
		if ($_POST["dataBase"]==="dataBaseCreate" && $_POST["password"]===$GLOBALS['dbManipulatePassword']){
			createDataBase();
		}
		if ($_POST["dataBase"]==="dataBaseDelete" && $_POST["password"]===$GLOBALS['dbManipulatePassword']){
			deleteDataBase();
		}
		else{
			$error="Помилка вибору чи невідповідний пасворд";
		}
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
		//Create tables
		$name=$GLOBALS['panelTableName'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		$sql="CREATE TABLE $name(
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
			echo "
				<div class='alert alert-success'>
					Table created successfully
				</div>
			";
		}
		else{
			echo "
				<div class='alert alert-danger'>
					Error creating table: ".$conn->error.
				"</div>
			";
		}
		$conn->close;
	}

	//Delete Data Base --------------------------------
	function deleteDataBase(){
		$name=$GLOBALS['dbName'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		if ($conn->connect_error){
			header("HTTP/1.1 500 OK");
			echo "Connection error";
			return;
		}
		$sql="DROP DATABASE $name";
		if ($conn->query($sql)===TRUE){
			echo "
				<div class='alert alert-success'>
					Data base deleted successfully
				</div>
			";
		}
		else{
			echo "
				<div class='alert alert-danger'>
					Error deleting data base: ".$conn->error.
				"</div>
			";
		}
		$conn->close;
	}
		
?>