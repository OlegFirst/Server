<?php
	include "../config.php";
	include "serverStatus.php";
	include "solarPanel/dataBase_pattern.php";
		
	//Input data parsing
	$method=$_SERVER['REQUEST_METHOD'];//Request method
	$request=explode('/',trim($_SERVER['PATH_INFO'],'/'));
	$data=file_get_contents('php://input');//Request data
	$input=json_decode($data,true);
	
	//arg_message/$key1/$key2
	$key1=array_shift($request);
	$key2=array_shift($request);
	
	//echo $method." ".$key1." ".$key2;
	//serverStatus(400);
	
	switch ($method){
		case "GET":
			//Read panel pattern
			$res=readPattern($key1);
			if ($res=="")
				serverStatus(404);
			break;
		case "PUT":
			echo "PUT";
			break;
		default:
			// Bad request
			serverStatus(400);
	}
	
	//Read solar panel`s table and filter pattern
	function readPattern($arg){
		$res="";
		if ($arg==="panel")
			$res=$GLOBALS['solarPanelsJson'];
		if ($arg==="filter")
			$res="filterArray";
		if ($arg==="dimension")
			$res=$GLOBALS['dimensionsJson'];
		if ($arg==="value")
			$res=$GLOBALS['valuesJson'];
		echo $res;
		return $res;
	}
	
?>









[{"id":"#model","value":""},{"id":"#manufacturer","value":"Dropdown"},{"id":"#makerId","value":"Dropdown"},{"id":"#productWarrantyId","value":"Dropdown"},{"id":"#outPutWarrantyId","value":"Dropdown"},{"id":"#checkedQualityId","value":""},{"id":"#voltageOfMaximumPowerId","value":""},{"id":"#maximumPowerId","value":""},{"id":"#moduleEfficiencyId","value":"Dropdown"},{"id":"#panelHeightId","value":""},{"id":"#panelWidthId","value":""},{"id":"#panelThicknessId","value":""},{"id":"#panelWeightId","value":""},{"id":"#frameId","value":"Dropdown"},{"id":"#frameColorId","value":"Dropdown"},{"id":"#cableId","value":"Dropdown"},{"id":"#connectorId","value":"Dropdown"},{"id":"#caption","value":""},{"id":"#imageURL1","value":""},{"id":"#price1","value":""},{"id":"#price2","value":""}]