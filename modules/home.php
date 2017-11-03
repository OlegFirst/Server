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
	<script src="../js/javascript.js"></script>
</head>
<body>

	<!-- Home page -->
	
	<?php include "header.php" ?>
	
	<!-- Sever side -->
	<?php include "dataBase.php" ?>
	
	<div class="pageTitle well">
		<h1>HOME</h1>
	</div>
	<br>
	
	<section class="container">
		<!-- Create/delete data base -->
		<form class="text-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST'>
			<input type="radio" name="dataBase" value="dataBaseCreate">Створити базу даних<br>
			<input type="radio" name="dataBase" value="dataBaseDelete">Видалити базу даних<br>
			<input type="password" name="password" placeholder="Password"><br>
			<input type="submit" class="btn btn-success">
			<p class="error"><?php echo $error ?></p>
			<p class="success"><?php echo $success ?></p>
		</form>
	</section>
	
</body>
</html>