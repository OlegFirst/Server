<?php include "solarPanel_pattern.php" ?>

<!-- Solar panel -->
<table id="solarPanelTable" class="solarPanelTable table table-bordered">
	<thead>
		<tr class="info">
			<th colspan="2">Solar panel</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($solarPanelTable as $index){
				//Name and value
				echo "<tr><td>$index->name</td><td>$index->value</td></tr>";
			}
		?>
	</tbody>
</table>

<?php //print_r($solarPanels); ?>

<!-- Input solar panel. Create table -->


<!-- CAPTION field -->

<div id="addPanel" class="input text-center" style="display:none;">
	<ul class="input-list" class="list-group">
		<li class="input-list-title list-group-item list-group-item-info">ДОДАТИ ПАНЕЛЬ</li>
		<?php
			foreach ($solarPanels as $index){
				//Name
				echo "<li class='list-group-item'>$index->name";
					//Dimension
					if ($index->dimension!='')
						echo ", $index->dimension";
					//Values
					if (count($index->values)>0){
						//Create dropdown list
						echo " <div class='dropdown' style='display:inline-block;'>
								<button id=$index->id class='item btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Dropdown<span class='caret'></span></button>
								<ul class='dropdown-menu'>";
						for ($i=0; $i<count($index->values); $i++){
							$classValue=$index->values[$i]->id;
							echo "<li><a class='$classValue' href='javascript:console.log(1);' onclick='solarPanels_dropdown(this)'>";
							echo $index->values[$i]->value;
							echo "</a></li>";
						}
						echo "</ul></div>";
					}
					else{
						//Create input field
						echo " <input id=$index->id class='item' type='text'>";
					}
				echo "</li>";
			}
		?>
		<li class="list-group-item">
			<button type="button" class="input-list-button cancel btn btn-link" onclick="solarPanels_cancel()">Cancel</button>
			<button type="button" class="input-list-button ok btn btn-success" onclick="solarPanels_OK()">OK</button>
		</li>
	</ul>
</div>