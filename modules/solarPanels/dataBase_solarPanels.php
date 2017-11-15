<?php
	$conn=null;
	$tableName="solarPanel_goods";

	/* Read solar panel with id=1. Read panel items */
	function readSolarPanel($id){
		/* IMPORTANT!
		/ 'itemName' should contain id if it has value-data (model but makerId)
		*/	
		$tableName=$GLOBALS['tableName'];
		//Collection
		$solarPanels=array();
		$conn=connectionOpen();
		$GLOBALS['conn']=$conn;
		//- Get 'id'
		$solarPanels[]=new Item("id","None",$id,"None");
		//- Get 'model'
		$res1=inner("SELECT $tableName.model FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT * FROM translate WHERE itemName='model'");
		$solarPanels[]=new Item($res2[itemName],$res2[itemTranslate],$res1[model],"None");
		//- Get 'manufacturer'
		$res1=inner("SELECT manufacturer.value FROM $tableName INNER JOIN manufacturer ON $tableName.manufacturerId=manufacturer.id WHERE $tableName.id=$id");
		$res2=inner("SELECT * FROM translate WHERE itemName='manufacturer'");
		$solarPanels[]=new Item("manufacturerId",$res2[itemTranslate],$res1[value],"None");
		//- Get 'maker'
		$res1=inner("SELECT maker.value FROM $tableName INNER JOIN maker ON $tableName.makerId=maker.id WHERE $tableName.id=$id");
		$res2=inner("SELECT * FROM translate WHERE itemName='maker'");
		$solarPanels[]=new Item("makerId",$res2[itemTranslate],$res1[value],"None");
		//- Get 'productWarranty'
		$res1=inner("SELECT productWarranty.value FROM $tableName INNER JOIN productWarranty ON $tableName.productWarrantyId=productWarranty.id WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='productWarranty'");
		$solarPanels[]=new Item("productWarrantyId",$res2[itemTranslate],$res1[value],$res2[value]);
		//- Get 'outputWarranty'
		$res1=inner("SELECT outputWarranty.value FROM $tableName INNER JOIN outputWarranty ON $tableName.outputWarrantyId=outputWarranty.id WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='outputWarranty'");
		$solarPanels[]=new Item("outputWarrantyId",$res2[itemTranslate],$res1[value],$res2[value]);
		//- Get 'checkedQuality'
		$res1=inner("SELECT checkedQuality FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate FROM translate WHERE itemName='checkedQuality'");
		$solarPanels[]=new Item("checkedQuality",$res2[itemTranslate],$res1[checkedQuality],"None");
		//- Get 'voltageOfMaximumPower'
		$res1=inner("SELECT voltageOfMaximumPower FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='voltageOfMaximumPower'");
		$solarPanels[]=new Item("voltageOfMaximumPower",$res2[itemTranslate],$res1[voltageOfMaximumPower],$res2[value]);
		//- Get 'maximumPower'
		$res1=inner("SELECT maximumPower FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='maximumPower'");
		$solarPanels[]=new Item("maximumPower",$res2[itemTranslate],$res1[maximumPower],$res2[value]);
		//- Get 'moduleEfficiency'
		$res1=inner("SELECT moduleEfficiency.value FROM $tableName INNER JOIN moduleEfficiency ON $tableName.moduleEfficiencyId=moduleEfficiency.id WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='moduleEfficiency'");
		$solarPanels[]=new Item("moduleEfficiencyId",$res2[itemTranslate],$res1[value],$res2[value]);
		//- Get 'panelHeight'
		$res1=inner("SELECT panelHeight FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelHeight'");
		$solarPanels[]=new Item("panelHeight",$res2[itemTranslate],$res1[panelHeight],$res2[value]);
		//- Get 'panelWidth'
		$res1=inner("SELECT panelWidth FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelWidth'");
		$solarPanels[]=new Item("panelWidth",$res2[itemTranslate],$res1[panelWidth],$res2[value]);
		//- Get 'panelThickness'
		$res1=inner("SELECT panelThickness FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelThickness'");
		$solarPanels[]=new Item("panelThickness",$res2[itemTranslate],$res1[panelThickness],$res2[value]);
		//- Get 'panelWeight'
		$res1=inner("SELECT panelWeight FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelWeight'");
		$solarPanels[]=new Item("panelWeight",$res2[itemTranslate],$res1[panelWeight],$res2[value]);
		//- Get 'frame'
		$res1=inner("SELECT frame.value FROM $tableName INNER JOIN frame ON $tableName.frameId=frame.id WHERE $tableName.id=$id");
		$res2=inner("SELECT itemTranslate FROM translate WHERE itemName='frame'");
		$solarPanels[]=new Item("frameId",$res2[itemTranslate],$res1[value],"None");
		//- Get 'frameColor'
		$res1=inner("SELECT frameColor.value FROM $tableName INNER JOIN frameColor ON $tableName.frameColorId=frameColor.id WHERE $tableName.id=$id");
		$res2=inner("SELECT itemTranslate FROM translate WHERE itemName='frameColor'");
		$solarPanels[]=new Item("frameColorId",$res2[itemTranslate],$res1[value],"None");
		//- Get 'cable'
		$res1=inner("SELECT cable FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate FROM translate WHERE itemName='cable'");
		$solarPanels[]=new Item("cable",$res2[itemTranslate],$res1[cable],"None");
		//- Get 'connector'
		$res1=inner("SELECT connector.value FROM $tableName INNER JOIN connector ON $tableName.connectorId=connector.id WHERE $tableName.id=$id");
		$res2=inner("SELECT itemTranslate FROM translate WHERE itemName='connector'");
		$solarPanels[]=new Item("connectorId",$res2[itemTranslate],$res1[value],"None");
		//- Get 'caption'
		$res1=inner("SELECT caption FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT itemTranslate FROM translate WHERE itemName='caption'");
		$solarPanels[]=new Item("caption",$res2[itemTranslate],$res1[caption],"None");
		//- Get 'imageURL1'
		$res1=inner("SELECT imageURL1 FROM $tableName WHERE $tableName.id=$id");
		$slarPanels[]=new Item("imageURL1","None",$res1[imageURL1],"None");
		//- Get 'price1'
		$res1=inner("SELECT price1 FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='price1'");
		$solarPanels[]=new Item("price1",$res2[itemTranslate],$res1[price1],$res2[value]);
		//- Get 'price2'
		$res1=inner("SELECT price2 FROM $tableName WHERE $tableName.id=$id");
		$res2=inner("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='price2'");
		$solarPanels[]=new Item("price2",$res2[itemTranslate],$res1[price2],$res2[value]);
		// Close close
		connectionClose($conn);
		
		return $solarPanels;
	}
	
	//Read all solar panels
	function readSolarPanelAll(){
		$solarPanelsAll=array();
		$tableName=$GLOBALS['tableName'];
		/*$lastId=solarPanel_lastId();*/
		//Collect all 'id' from "solarPanel_goods" in data base
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		if ($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}
		$sql="SELECT id FROM $tableName";
		$result=$conn->query($sql);
		$matrix=array();
		if ($result->num_rows>0){
			while ($row=$result->fetch_assoc()){
				$matrix[]=$row;
			}
		}
		else echo "0 results";
		$conn->close();
		//Collect all data about solar panels
		for ($i=0; $i<count($matrix); $i++){
			$solarPanelsAll[]=readSolarPanel($matrix[$i][id]);
		}
		return $solarPanelsAll;
	}
				
	// Read a row in the 'solar panel table'
	/*function solarPanelIdRead($id){
		$tableName=$GLOBALS['solarPanel_table'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		$sql="SELECT * FROM $tableName WHERE id=$id";
		if ($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}
		$result=$conn->query($sql);
		if ($result->num_rows>0){
			$tableData=$result->fetch_assoc();
			//print_r($tableData);
			//echo "Data Base----------------------<br>";
		}
		else echo "0 results";
		$conn->close();	
	}*/
	
	//Read data from data base
	function connectionOpen(){
		$tableName=$GLOBALS['solarPanel_table'];
		$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
		if ($conn->connect_error){
			die("Connection failed: ".$conn->connect_error);
		}
		return $conn;
	}
	
	function connectionClose(){
		$GLOBALS['conn']->close();
	}
	
	function inner($sql){
		$conn=$GLOBALS['conn'];
		$result=$conn->query($sql);
		$matrix=array();
		if ($result->num_rows>0){
			while ($row=$result->fetch_assoc()){
				$matrix[]=$row;
			}
		}
		else echo "0 results";
		return $matrix[0];
	}

	//Classes
	class Item{
		public $itemName;
		public $itemTranslate;
		public $itemValue;
		public $itemDimension;
		function __construct($itemName, $itemTranslate, $itemValue, $itemDimension){
			$this->itemName=$itemName;
			$this->itemTranslate=$itemTranslate;
			$this->itemValue=$itemValue;
			$this->itemDimension=$itemDimension;
		}
	}
	
	function prn($arg){
		print_r($arg);
		echo "<br>";
	}
	
	function solarPanel_lastId(){
		$tableName=$GLOBALS['tableName'];
		$conn=connectionOpen();
		$GLOBALS['conn']=$conn;
		$res=inner("SELECT id FROM $tableName ORDER BY id DESC LIMIT 0,1");
		connectionClose();
		return $res[id];
	}

// Updating 'solar panel table'
function solarPanelUpdate($obj){
	$tableName="solarPanel_goods";
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
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	if ($conn->query($sql)===TRUE){
		echo "OK";
	}
	else{
		echo "Error: ".$conn->error;
	}
	$conn->close();
}

//Delete solar panel row with id
function deleteSolarPanel($id){
	$tableName="solarPanel_goods";
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$sql="DELETE FROM $tableName WHERE id=$id";
	if ($conn->query($sql)===TRUE)
		echo "Solar panel with id=$id was deleted successfully";
	else
		echo "Error deleting record: ".$conn->error;
	$conn->close();
}

?>