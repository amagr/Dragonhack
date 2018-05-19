<?php
	include "Models\\LogInModel.php";

	class LogInController {

		public static function index() {
			include "Views/LogIn/index.php";
		}

		public static function login($link) {
			$model = new LogInModel();
			$model->logIn($link);
			header("Location: /");
		}

		public static function logout() {
			$model = new LogInModel();
			$model->logOut();

			header("Location: /"); 
		}
	}

?>