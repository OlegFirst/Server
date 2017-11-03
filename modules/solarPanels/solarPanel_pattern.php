<?php
	
	//Common classes
	class Item{
			public $id;
			public $value;
			function __construct($id,$value){
				$this->id=$id;
				$this->value=$value;
			}
		}
		
	//Dimension
	$dimensions=array();
	array_push($dimensions, new Item("productWarranty","рік"));
	array_push($dimensions, new Item("outPutWarranty","рік"));
	array_push($dimensions, new Item("checkedQuality","?"));
	array_push($dimensions, new Item("voltageOfMaximumPower","В"));
	array_push($dimensions, new Item("maximumPower","Вт"));
	array_push($dimensions, new Item("moduleEfficiency","%"));
	array_push($dimensions, new Item("panelHeight","мм"));
	array_push($dimensions, new Item("panelWidth","мм"));
	array_push($dimensions, new Item("panelThickness","мм"));
	array_push($dimensions, new Item("panelWeight","г"));
			
	//Manufacturer
	$manufacturers=array();
	array_push($manufacturers, new Item(1,"Sharp Electronic GmbH Hamburg"));
		
	//Maker
	$makers=array();
	array_push($makers, new Item(1,"Україна"));
	array_push($makers, new Item(2,"Африка"));
		
	//Product warranty
	$productWarranties=array();
	array_push($productWarranties, new Item(1,10));
	array_push($productWarranties, new Item(2,12));
	array_push($productWarranties, new Item(3,15));
	array_push($productWarranties, new Item(4,20));
	array_push($productWarranties, new Item(5,25));
		
	//moduleEfficiencyId
	$moduleEfficiencies=array();
	array_push($moduleEfficiencies, new Item(1,"меньше 16%"));
	array_push($moduleEfficiencies, new Item(2,"16%-17%"));
	array_push($moduleEfficiencies, new Item(3,"17%-18%"));
	array_push($moduleEfficiencies, new Item(4,"більше 16%"));	
		
	//frameId
	$frames=array();
	array_push($frames, new Item(1,"анодований алюмінієвий сплав"));
	
	//frameColor
	$frameColor=array();
	array_push($frameColor, new Item(1,"чорний"));
	array_push($frameColor, new Item(2,"срібний"));
		
	//Solar panel table
	/*
	//	new solarPanelItem("Name","id","dimension","values")
	*/
	$solarPanels=array();
	array_push($solarPanels, new solarPanelItem("Модель панелі","model","",array()));
	array_push($solarPanels, new solarPanelItem("Виробник","makerId","",$makers));
	array_push($solarPanels, new solarPanelItem("Завод виробник","manufacturerId","",$manufacturers));
	array_push($solarPanels, new solarPanelItem("Гарантія на виріб","productWarrantyId",$dimensions[0]->value,$productWarranties));
	array_push($solarPanels, new solarPanelItem("Гарантована лінійна вихідна потужність","outPutWarrantyId",$dimensions[1]->value,array()));
	array_push($solarPanels, new solarPanelItem("Перевірена якість","checkedQualityId",$dimensions[2]->value,array()));
	array_push($solarPanels, new solarPanelItem("Напруга в точці максимальної потужності","voltageOfMaximumPowerId",$dimensions[3]->value,array()));
	array_push($solarPanels, new solarPanelItem("Максимальна потужність","maximumPowerId",$dimensions[4]->value,array()));
	array_push($solarPanels, new solarPanelItem("Ефективність модуля","moduleEfficiencyId",$dimensions[5]->value,$moduleEfficiencies));
	array_push($solarPanels, new solarPanelItem("Висота панелі","panelHeightId",$dimensions[6]->value,array()));
	array_push($solarPanels, new solarPanelItem("Ширина панелі","panelWidthId",$dimensions[7]->value,array()));
	array_push($solarPanels, new solarPanelItem("Товщина панелі","panelThicknessId",$dimensions[8]->value,array()));
	array_push($solarPanels, new solarPanelItem("Вага панелі","panelWeightId",$dimensions[9]->value,array()));
	array_push($solarPanels, new solarPanelItem("Рама","frameId","",$frames));
	array_push($solarPanels, new solarPanelItem("Колір рами","frameColorId","",$frameColor));
	array_push($solarPanels, new solarPanelItem("Кабель","cableId","",array(new Item(1,"PV-f кабель 4.0мм; довжина 1000мм"))));
	array_push($solarPanels, new solarPanelItem("Коннектор","connectorId","",array(new Item("1","MC4"))));
	array_push($solarPanels, new solarPanelItem("Ремарка","caption","",array()));
	array_push($solarPanels, new solarPanelItem("ФотоURL1","imageURL1","",array()));
	array_push($solarPanels, new solarPanelItem("Ціна1","price1","",array()));
	array_push($solarPanels, new solarPanelItem("Ціна2","price2","",array()));
		
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
	
	//Solar panel table object.
	/*
	//	new solarPanelItem("Name","id","dimension","value")
	*/
	$solarPanelTable=array();
	array_push($solarPanelTable, new solarPanelItem("Модель панелі","model","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Виробник","makerId","",""));
	array_push($solarPanelTable, new solarPanelItem("Завод виробник","manufacturerId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Гарантія на виріб","productWarrantyId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Гарантована лінійна вихідна потужність","outPutWarrantyId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Перевірена якість","checkedQualityId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Напруга в точці максимальної потужності","voltageOfMaximumPowerId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Максимальна потужність","maximumPowerId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Ефективність модуля","moduleEfficiencyId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Висота панелі","panelHeightId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Ширина панелі","panelWidthId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Товщина панелі","panelThicknessId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Вага панелі","panelWeightId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Рама","frameId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Колір рами","frameColorId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Кабель","cableId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Коннектор","connectorId","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Ремарка","caption","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("ФотоURL1","imageURL1","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Ціна1","price1","",""));
	array_push($solarPanelTable, new solarPaneTablelItem("Ціна2","price2","",""));
	//print_r($solarPanelTable);
	//echo "<br>";
	
	class solarPaneTablelItem{
		public $name;
		public $id;
		public $dimension;
		public $value;		
		function __construct($name,$id,$dimension,$value){
			$this->id=$id;
			$this->name=$name;
			$this->dimension=$dimension;
			$this->value=$value;
		}
	}
	
	function solarPanelTable_set($id,$value){
		$matrix=$GLOBALS['solarPanelTable'];
		for ($i=0; $i<count($matrix); $i++){
			$element=$matrix[$i];
			if ($element->id===$id){
				$element->id=$value;
				break;
			}
		}
	}
	
?>