<?php include "Views/Layout/upper.php" ?>
		
		<div class="container">
			<form class="form-signin" method="post">
				<input type="text" name = "username" id="inputUsername" class="form-control" placeholder="Username" required autofocus><br>
				<input type="password" name = "password" id="inputPassword" class="form-control" placeholder="Password" required><br>
				<button name = "login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				<?php } ?>
			</form>
	    </div>

<?php include "Views/Layout/lower.php" ?>