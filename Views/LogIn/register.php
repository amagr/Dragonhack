<html>
	<head>
		<title>Dragon hack</title>
	</head>
	<body>
		<div class="container">
			<form class="form-register" method="post">
				<input type="text" name = "username" id="inputUsername" class="form-control" placeholder="Uporabniško ime" required autofocus><br>
				<input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required><br>
				<input type="password" name = "password" id="inputPassword" class="form-control" placeholder=" Repeat password" required><br>
				<select>
					<option value="0">No school</option>
					<?php while($row = mysqli_fetch_assoc($schools)) { ?>
						<option value="<?=$row['id_school']?>"><?=$row['name']?></option>
					<?php } ?>
				</select>
				<button name = "register" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			</form>
	    </div>
	</body>
</html>		