<!DOCTYPE html>
<html>
<head>
	<title>Сонячні батареї SERVER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="../bootstrap/bootstrap.css"></link>
	<script src="../bootstrap/jquery-3.1.1.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css"></link>
	<link rel="stylesheet" href="../css/solarPanels.css"></link>
	<script src="../js/javascript.js"></script>
	<script src="../js/solarPanels.js"></script>
	<script src="../js/dataBaseService.js"></script>
</head>
<body>

	<!-- Solar panel page -->

	<?php include "header.php" ?>
	
	<div class="pageTitle well">
		<h1>Сонячні панелі</h1>
	</div>
	<br>
	
	<section class="section container">
		<!-- Tables tools -->
		<div class="section-tools">
			<button id="toolsAddPanel" type="button" class="btn btn-primary">Додати панель</button>
			<button type="button" class="btn btn-danger">Видалити панель</button>
			<button type="button" class="btn btn-primary">Редагувати панель</button>
			<button type="button" class="btn btn-primary">Зразок панелей</button>
			<button type="button" class="btn btn-primary">Фільтр</button>
		</div>
		<!-- Content -->
		<main></main>	
	</section>

	<!-- Input -->
	<?php include "input/inputSp_addPanel.php" ?>
	
</body>
</html>