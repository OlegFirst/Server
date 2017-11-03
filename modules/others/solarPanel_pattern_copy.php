<?php
	//header("Content-Type: application/json; charset=UTF-8");
	
	//Goods dimension
	//
	// Remark.	$name equals data table name
	//
	$dimensions=array();
	array_push($dimensions, new dimensionItem("productWarranty","рік"));
	array_push($dimensions, new dimensionItem("outPutWarranty","рік"));
	array_push($dimensions, new dimensionItem("checkedQuality","?"));
	array_push($dimensions, new dimensionItem("voltageOfMaximumPower","В"));
	array_push($dimensions, new dimensionItem("maximumPower","Вт"));
	array_push($dimensions, new dimensionItem("moduleEfficiency","%"));
	array_push($dimensions, new dimensionItem("panelHeight","мм"));
	array_push($dimensions, new dimensionItem("panelWidth","мм"));
	array_push($dimensions, new dimensionItem("panelThickness","мм"));
	array_push($dimensions, new dimensionItem("panelWeight","г"));
	array_push($dimensions, new dimensionItem("cable","?"));
	array_push($dimensions, new dimensionItem("connector","?"));
	array_push($dimensions, new dimensionItem("price1","грн."));
	array_push($dimensions, new dimensionItem("price2","?"));
	$dimensionsJson=json_encode($dimensions,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
	class dimensionItem{
		public $name;
		public $value;
		function __construct($name,$value){
			$this->name=$name;
			$this->value=$value;
		}
	}
	
	//Goods value
	$values=array();
	array_push($values, new valueItem("productWarranty",array("10","12","15","20","25")));
	$valuesJson=json_encode($values,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
	class valueItem{
		public $name;
		public $nameValue;
		function __construct($name,$nameValue){
			$this->name=$name;
			$this->nameValue=$nameValue;
		}
	}
	
	//Solar panel table
	/*
	//	new solarPanelItem("Name","id","dimension","dimensionValues")
	*/
	$solarPanels=array();
	array_push($solarPanels, new solarPanelItem("Виробник","makerId","",array('Україна','Африка')));
	array_push($solarPanels, new solarPanelItem("Гарантія на виріб","productWarrantyId","рік",array("10","12","15","20","25")));
	array_push($solarPanels, new solarPanelItem("Гарантована ЛВП","outPutWarrantyId","рік",array(15,20,25)));
	array_push($solarPanels, new solarPanelItem("Перевірена якість","checkedQualityId","?",array()));
	array_push($solarPanels, new solarPanelItem("Напруга в ТМП","voltageOfMaximumPowerId","В",array()));
	array_push($solarPanels, new solarPanelItem("Максимальна потужність","maximumPowerId","Вт",array()));
	array_push($solarPanels, new solarPanelItem("Ефективність модуля","moduleEfficiencyId","%",array("меньше 16%","16%-17%","17%-18%","більше 16%")));
	array_push($solarPanels, new solarPanelItem("Висота панелі","panelHeightId","мм",array()));
	array_push($solarPanels, new solarPanelItem("Ширина панелі","panelWidthId","мм",array()));
	array_push($solarPanels, new solarPanelItem("Товщина панелі","panelThicknessId","мм",array()));
	array_push($solarPanels, new solarPanelItem("Вага панелі","panelWeightId","г",array()));
	array_push($solarPanels, new solarPanelItem("Рама","frameId","",array()));
	array_push($solarPanels, new solarPanelItem("Колір рами","frameColorId","",array("чорний","срібний")));
	array_push($solarPanels, new solarPanelItem("Кабель","cableId","",array()));
	array_push($solarPanels, new solarPanelItem("Коннектор","connectorId","",array()));
	array_push($solarPanels, new solarPanelItem("Ремарка","caption","",array()));
	array_push($solarPanels, new solarPanelItem("ФотоURL1","imageURL1","",array()));
	array_push($solarPanels, new solarPanelItem("Ціна1","price1","",array()));
	array_push($solarPanels, new solarPanelItem("Ціна2","price2","",array()));
	$solarPanelsJson=json_encode($solarPanels,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
	//print_r($solarPanels);
	class solarPanelItem{
		public $name;
		public $id;
		public $dimension;
		public $values;
		function __construct($name,$id,$dimension,$values){
			$this->id=$id;
			$this->name=$name;
			$this->dimension=$dimension;
			$this->values=$values;
		}
	}
	
?>