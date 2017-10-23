<?php
	include "../config.php";
	include "serverStatus.php";
	include "dataBase_pattern.php";
		
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
			if ($key1==="panel"){
				//Read panel pattern
				readPattern("panel");
			}
			else{
				// Bad request
				serverStatus(400);
			}
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
		if ($arg==="panel"){
			/*$res=array();
			$res[]="statusMessage";
			$res[]=$GLOBALS['solarPanel'][0];
			echo $res;*/
			
			$res=json_encode($GLOBALS['solarPanel']);
			echo $res;
		}
	}
	
?>