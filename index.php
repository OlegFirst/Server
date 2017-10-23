<!DOCTYPE html>
<html>
<head>
	<title>Сонячні батареї SERVER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/bootstrap.css"></link>
	<script src="bootstrap/jquery-3.1.1.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/autorization.css"></link>
	<script src="js/loginForm.js"></script>
</head>
<body>
	
	<section id="loginForm" class="container">
		<div class="jumbotron center-block">
			<h3>Login form</h3><br>
			<div id="form">
				<div class="form-group">
					<label for="login">Login:</label>
					<input id="login" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input id="password" type="password" class="form-control" required>
				</div>
				<button id="submitButton" type="submit" class="btn btn-success">Submit</button>
			</div>
			<div id="infoError" class="info alert alert-danger">
				<strong>Warring!</strong> Login or password is wrong
			</div>
			<div id="infoSuccess" class="info alert alert-success">
				<strong>Success!</strong> Welcome
			</div>
		</div>
	</section>
	
<?php
	//header("Location: html/home.php");
?>
</body>
</html>