<!DOCTYPE html>
<html>
<head>
	<title>Сонячні батареї SERVER</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta charset="utf-8">
	<meta "Content-Type: application/json; charset=UTF-8">
	<link rel="stylesheet" href="../bootstrap/bootstrap.css"></link>
	<script src="../bootstrap/jquery-3.1.1.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css"></link>
	<link rel="stylesheet" href="../css/solarPanels.css"></link>
	<script src="../js/javascript.js"></script>
	<script src="../js/solarPanels.js"></script>
	<script src="../js/classes.js"></script>
	<!-- <script src="solarPanels/solarPanels.js"></script> -->
	<!-- <script src="../js/dataBase/dataBaseService.js"></script> -->
	<script src="../js/dataBase/ajax.js"></script>
	<script src="../js/dataBase/dataBaseError.js"></script>
	<script src="../js/navigator.js"></script>
</head>
<body>

	<!-- Solar panel page -->

	<?php include "header.php" ?>
	
	<!-- Different working information -->
	<?php include "workInformation.php" ?>
	
	<div class="pageTitle well">
		<h1>Сонячні панелі</h1>
	</div>
	<br>
	
	<section class="section container">
		<!-- Image loader -->
		<?php include "imageLoader/scanDir.html" ?>
		<!-- Tables tools -->
		<div class="solarPanel-section-tools">
			<button id="toolsAddPanel" type="button" class="btn btn-primary" onclick="solarPanels_panelCreate()">Додати панель</button>
			<button id="toolsRemovePanel" type="button" class="btn btn-danger" onclick="solarPanels_panelRemove()">Видалити панель</button>
			<button id="toolsEditPanel" type="button" class="btn btn-primary">Редагувати панель</button>
			<button id="toolsPanelPattern" type="button" class="btn btn-primary">Зразок панелей</button>
			<button id="toolsFilterPanel" type="button" class="btn btn-primary">Фільтр</button>
		</div>
		<main class="solarPanel-main">
			<!-- Table patterns -->
			<?php include "solarPanels/solarPanel_tables.php" ?>
		</main>
		<!-- Messages -->
		<div id="messageError" class="message alert alert-danger">
			<p class="message-error"></p>
			<p class="message-content"></p>
		</div>		
	</section>
	
	<div id="image"></div>
	
	<!-- <button type="button" onclick="clone1()">Clone</button> -->
	
</body>
</html>