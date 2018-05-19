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
		public static function registration($link) {
			$model = new LogInModel();
			$schools = $model->getAllSchools($link);
			include "Views/LogIn/register.php";
		}
		public static function registration_post($link){
			$model = new LogInModel();
			$model->insert_new_user($link);
			header("Location: /?param1=");
		}
		public static function logout() {
			$model = new LogInModel();
			$model->logOut();
			header("Location: /"); 
		}
	}

?>