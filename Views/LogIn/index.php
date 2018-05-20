<?php include "Views/Layout/upper.php" ?>
<html>
	<head>
		<title>Dragon hack</title>
	</head>
	<body>

		<div class="container" style="width: 40%; margin-left: auto; margin-right: auto;">
			<form class="form-signin" method="post">
				<input type="text" name = "username" id="inputUsername" class="form-control" placeholder="Username" required autofocus><br>
				<input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required><br>
				<button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</form>
				<a href="?param1=register" style="text-decoration: none"><button name="register" style="background-color: #007bff!important;" class="btn btn-lg btn-primary btn-block" stlyle="margin-top:15px;">Register</button></a>
	    </div>

<?php include "Views/Layout/lower.php" ?>