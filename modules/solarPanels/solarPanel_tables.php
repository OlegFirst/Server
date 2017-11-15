<!-- Solar panel -->
	<table id="solarPanelTable" class="solarPanelTable table table-bordered" onclick="solarPanels_tableClicked(this)">
		<thead>
			<tr class="info">
				<th colspan="2">Solar panel</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

<!-- Input solar panel. Create table -->

<?php
	include "../config.php";
	//include "../../config.php";
	$solarPanelTable=array();
	$tableName="solarPanel_goods";
	
	$conn=new mysqli($GLOBALS['serverName'],$GLOBALS['userName'],$GLOBALS['password'],$GLOBALS['dbName']);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	
	/* IMPORTANT!
	/ 'itemName' should contain id if it has value-data (model but makerId)
	/ new Input("itemName","itemTranslate","itemDimension","itemValues" as array);
	*/	
	
	//-Get model
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='model'",$conn);
	$solarPanelTable[]=new Input("model",$res1[itemTranslate],"None","None");
	//-Get maker
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='maker'",$conn);
	$res2=innerInputSeveral("SELECT * FROM maker",$conn);
	$solarPanelTable[]=new Input("makerId",$res1[itemTranslate],$res2,"None");
	//-Get manufacturer
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='manufacturer'",$conn);
	$res2=innerInputSeveral("SELECT * FROM manufacturer",$conn);
	$solarPanelTable[]=new Input("manufacturerId",$res1[itemTranslate],$res2,"None");
	//-Get productWarranty
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='productWarranty'",$conn);
	$res2=innerInputSeveral("SELECT * FROM productWarranty",$conn);
	$solarPanelTable[]=new Input("productWarrantyId",$res1[itemTranslate],$res2,$res1[value]);
	//-Get outputWarranty
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='outputWarranty'",$conn);
	$res2=innerInputSeveral("SELECT * FROM outputWarranty",$conn);
	$solarPanelTable[]=new Input("outputWarrantyId",$res1[itemTranslate],$res2,$res1[value]);
	//-Get checkedQuality
	$res1=innerInput("SELECT translate.itemTranslate FROM translate WHERE translate.itemName='checkedQuality'",$conn);
	$solarPanelTable[]=new Input("checkedQuality",$res1[itemTranslate],"None","None");
	//-Get voltageOfMaximumPower
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='voltageOfMaximumPower'",$conn);
	$solarPanelTable[]=new Input("voltageOfMaximumPower",$res1[itemTranslate],"None",$res1[value]);
	//-Get maximumPower
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='maximumPower'",$conn);
	$solarPanelTable[]=new Input("maximumPower",$res1[itemTranslate],"None",$res1[value]);
	//-Get moduleEfficiency
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='moduleEfficiency'",$conn);
	$res2=innerInputSeveral("SELECT * FROM moduleEfficiency",$conn);
	$solarPanelTable[]=new Input("moduleEfficiencyId",$res1[itemTranslate],$res2,$res1[value]);
	//-Get panelHeight
	$res1=innerInput("SELECT itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelHeight'",$conn);
	$solarPanelTable[]=new Input("panelHeight",$res1[itemTranslate],"None",$res1[value]);
	//-Get panelWidth
	$res1=innerInput("SELECT itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelWidth'",$conn);
	$solarPanelTable[]=new Input("panelWidth",$res1[itemTranslate],"None",$res1[value]);
	//-Get panelThickness
	$res1=innerInput("SELECT itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelThickness'",$conn);
	$solarPanelTable[]=new Input("panelThickness",$res1[itemTranslate],"None",$res1[value]);
	//-Get panelWeight
	$res1=innerInput("SELECT itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='panelWeight'",$conn);
	$solarPanelTable[]=new Input("panelWeight",$res1[itemTranslate],"None",$res1[value]);
	//-Get frame
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='frame'",$conn);
	$res2=innerInputSeveral("SELECT * FROM frame",$conn);
	$solarPanelTable[]=new Input("frameId",$res1[itemTranslate],$res2,"None");
	//-Get frameColor
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='frameColor'",$conn);
	$res2=innerInputSeveral("SELECT * FROM frameColor",$conn);
	$solarPanelTable[]=new Input("frameColorId",$res1[itemTranslate],$res2,"None");
	//-Get cable
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='cable'",$conn);
	$res2=innerInputSeveral("SELECT * FROM frame",$conn);
	$solarPanelTable[]=new Input("cable",$res1[itemTranslate],"None",$res1[value]);
	//-Get connector
	$res1=innerInput("SELECT translate.itemTranslate FROM translate WHERE translate.itemName='connector'",$conn);
	$res2=innerInputSeveral("SELECT * FROM connector",$conn);
	$solarPanelTable[]=new Input("connectorId",$res1[itemTranslate],$res2,"None");
	//-Get caption
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='caption'",$conn);
	$solarPanelTable[]=new Input("caption",$res1[itemTranslate],"None","None");
	//-Get imageURLs
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='imageURL1'",$conn);
	$solarPanelTable[]=new Input("imageURL1",$res1[itemTranslate],"None","None");
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='imageURL2'",$conn);
	$solarPanelTable[]=new Input("imageURL2",$res1[itemTranslate],"None","None");
	$res1=innerInput("SELECT itemTranslate FROM translate WHERE translate.itemName='imageURL3'",$conn);
	$solarPanelTable[]=new Input("imageURL3",$res1[itemTranslate],"None","None");
	//-Get price1
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='price1'",$conn);
	$solarPanelTable[]=new Input("price1",$res1[itemTranslate],"None",$res1[value]);
	//-Get price2
	$res1=innerInput("SELECT translate.itemTranslate, dimension.value FROM translate INNER JOIN dimension ON translate.itemName=dimension.itemName WHERE translate.itemName='price2'",$conn);
	$solarPanelTable[]=new Input("price2",$res1[itemTranslate],"None",$res1[value]);
		
	$conn->close();
	
	//prn($solarPanelTable);
	//prn($solarPanelTable[count($solarPanelTable)-1]);
	//prn($solarPanelTable[1]->itemValues[0]);
	
	function innerInput($sql,$conn){
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
	function innerInputSeveral($sql,$conn){
		$result=$conn->query($sql);
		$matrix=array();
		if ($result->num_rows>0){
			while ($row=$result->fetch_assoc()){
				$matrix[]=$row;
			}
		}
		else echo "0 results";
		return $matrix;
	}
	function prn($arg){
		print_r($arg);
		echo "<br>";
	}
	//Class
	class Input{
		public $itemName;
		public $itemTranslate;
		public $itemValues;
		public $itemDimension;
		function __construct($itemName, $itemTranslate, $itemValues, $itemDimension){
			$this->itemName=$itemName;
			$this->itemTranslate=$itemTranslate;
			$this->itemValues=$itemValues;
			$this->itemDimension=$itemDimension;
		}
	}
?>

<div id="addPanel" class="input text-center" style="/*display:none;*/">
	<ul class="input-list" class="list-group">
		<li class="input-list-title list-group-item list-group-item-info">ДОДАТИ ПАНЕЛЬ</li>
		<?php
			foreach ($solarPanelTable as $index){
				//Name
				echo "<li class='list-group-item'>$index->itemTranslate";
					//Dimension
					if ($index->itemDimension!='None')
						echo ", $index->itemDimension";
					//Values
					if ($index->itemValues!='None'){
						//Create dropdown list
						echo " <div class='dropdown' style='display:inline-block;'>
								<button id=$index->itemName class='item btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Dropdown<span class='caret'></span></button>
								<ul class='dropdown-menu'>";
						for ($i=0; $i<count($index->itemValues); $i++){
							$classValue=$index->itemValues[$i][id];
							echo "<li><a class='$classValue' href='javascript:console.log(1);' onclick='solarPanels_dropdown(this)'>";
							echo $index->itemValues[$i][value];
							echo "</a></li>";
						}
						echo "</ul></div>";
					}
					else{
						//Create input field
						if ($index->itemName==='imageURL1' || $index->itemName==='imageURL2' || $index->itemName=='imageURL3'){
							//Insert a photo(es)
							echo "<br><button class='targetId-image1 btn btn-primary' type='button' onclick='solarPanels_loadPhoto()'>Вибрати фотографію</button>
								<div id='image1' class='list-group-item-photo'></div>
							";
						}
						elseif ($index->itemName==='imageURL1' || $index->itemName==='imageURL2' || $index->itemName=='imageURL3'){
							//Insert a photo(es)
							echo "<br><button class='targetId-image1 btn btn-primary' type='button' onclick='solarPanels_loadPhoto()'>Вибрати фотографію</button>
								<div id='image2' class='list-group-item-photo'></div>
							";
						}
						elseif ($index->itemName==='imageURL1' || $index->itemName==='imageURL2' || $index->itemName=='imageURL3'){
							//Insert a photo(es)
							echo "<br><button class='targetId-image1 btn btn-primary' type='button' onclick='solarPanels_loadPhoto()'>Вибрати фотографію</button>
								<div id='image3' class='list-group-item-photo'></div>
							";
						}
						else{
							//Insert free data
							echo " <input id=$index->itemName class='item' type='text'>";
						}
					}
				echo "</li>";
			}
		?>
		<li class="list-group-item">
			<button type="button" class="input-list-button cancel btn btn-link event_workInformationClose" onclick="solarPanels_cancel()">Cancel</button>
			<button type="button" class="input-list-button ok btn btn-success" onclick="solarPanels_OK()">OK</button>
		</li>
	</ul>
</div>