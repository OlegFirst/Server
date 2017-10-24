<?php
	//header("Content-Type: application/json; charset=UTF-8");
		
	//Solar panel patterns -------------------------------------
	//Solar panel table
	$solarPanels=array();
	array_push($solarPanels, new solarPanelItem("Виробник","markerId"));
	array_push($solarPanels, new solarPanelItem("Гарантія на виріб","productWarrantyId"));
	array_push($solarPanels, new solarPanelItem("Гарантована ЛВП","outPutWarrantyId"));
	array_push($solarPanels, new solarPanelItem("Перевірена якість","checkedQualityId"));
	array_push($solarPanels, new solarPanelItem("Напруга в ТМП","voltageOfMaximumPowerId"));
	array_push($solarPanels, new solarPanelItem("Максимальна потужність","maximumPowerId"));
	array_push($solarPanels, new solarPanelItem("Ефективність модуля","moduleEfficiencyId"));
	array_push($solarPanels, new solarPanelItem("Висота панелі","panelHeightId"));
	array_push($solarPanels, new solarPanelItem("Ширина панелі","panelWeightId"));
	array_push($solarPanels, new solarPanelItem("Товщина панелі","panelThicknessId"));
	array_push($solarPanels, new solarPanelItem("Вага панелі","panelWeightId"));
	array_push($solarPanels, new solarPanelItem("Рама","frameId"));
	array_push($solarPanels, new solarPanelItem("Колір рами","frameColorId"));
	array_push($solarPanels, new solarPanelItem("Кабель","cabelId"));
	array_push($solarPanels, new solarPanelItem("Коннектор","connectorId"));
	array_push($solarPanels, new solarPanelItem("Ремарка","caption"));
	array_push($solarPanels, new solarPanelItem("ФотоURL1","imageURL1"));
	array_push($solarPanels, new solarPanelItem("Ціна1","price1"));
	array_push($solarPanels, new solarPanelItem("Ціна2","price2"));
	$solarPanelsJson=json_encode($solarPanels,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
		
	class solarPanelItem{
		public $name;
		public $id;
		function __construct($name,$id){
			$this->id=$id;
			$this->name=$name;
		}
	}
	
?>