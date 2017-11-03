<?php
	include "../../config.php";
	include "solarPanel_pattern.php";
	$solarPanel_table="solarPanel_goods";
	solarPanelIdRead(1);
	//solarPanelTableCreate($GLOBALS['solarPanelTable']);
	
	
	solarPanelTable_set(1,2);

//Create 'solar panel goods'
function createSolarPanels(){
	$name=$GLOBALS['solarPanel_table'];
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	$sql="CREATE TABLE $name(
		id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		model VARCHAR(25) NOT NULL,
		makerId INT(20) NOT NULL,
		manufacturerId INT(20) NOT NULL,
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
		connectorId INT(20) NOT NULL,
		caption VARCHAR(50) NOT NULL,			
		imageURL1 VARCHAR(50) NOT NULL,
		price1 INT(20) NOT NULL,
		price2 INT(20) NOT NULL
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

// Updating 'solar panel table'
function solarPanelUpdate($obj){
	$tableName=$GLOBALS['solarPanel_table'];
	$columns=$values="";
	foreach ($obj as $index){
		if ($columns==="")
			$columns=$index['id'];
		else
			$columns=$columns.", ".$index['id'];
		$valueI=$index['value'];
		if ($values==="")
			$values="'$valueI'";
		else
			$values=$values.", '$valueI'";
	}
	$sql="INSERT INTO $tableName ($columns) VALUES ($values)";
	//echo $sql;
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	if ($conn->connect_error){
		serverStatus(500);
		$conn->close();
	}
	else{
		//echo $sql;
		if ($conn->query($sql)===TRUE){
			//serverStatus(200);
			echo "OK";
			//Get last inserted id
			$lastId=$conn->insert_id;
			echo $lastId;
			$conn->close();
			//Read inserted data
			solarPanelIdRead($lastId);
		}
		else{
			//serverStatus(500);
			echo "Error";
			$conn->close();
		}
	}
}

// Read a row in the 'solar panel table'
function solarPanelIdRead($id){
	$tableName=$GLOBALS['solarPanel_table'];
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	$sql="SELECT * FROM $tableName WHERE id=$id";
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	//echo $sql;
	$result=$conn->query($sql);
	if ($result->num_rows>0){
		$tableData=$result->fetch_assoc();
		print_r($tableData);
		echo "Data Base----------------------<br>";
				
		//$solarPanelTable=$GLOBALS['solarPanelTable'];
		$matrix=$GLOBALS['solarPanelTable'];
		print_r($matrix);
		for ($i=0; $i<count($matrix); $i++){
			$element=$matrix[$i];
			echo $element->id;
			$item=$tableData[$element->id];
			print_r($item);
			echo "<br>";
			//matrix
		}
		
		
		//print_r($tableData->model);
		//foreach ($tableData as $index=>value){
		//	echo $index;
		//	echo "<br>";
			//solarPanelTable_set()
		//}
		
		
		
		
		//solarPanelTableCreate($GLOBALS['$solarPanelTable']);
	}
	else echo "0 results";
	$conn->close();	
	
}

//Table create
function solarPanelTableCreate($row){
	$solarPanelTable=$GLOBALS['$solarPanelTable'];
	print_r($solarPanelTable);
	echo "---------------------------<br>";
	print_r($solarPanelTable[0]->name);
}
	
?>