<?php
	include "Models\\HomeModel.php";

	class HomeController {

		public static function index() {
			$homeModel = new HomeModel();

			$person = $homeModel->getPerson();

			include "Views/Home/index.php";
		}
	}

?>