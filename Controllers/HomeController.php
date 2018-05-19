<?php
	include "Models\\HomeModel.php";

	class HomeController {


		public static function index($link) {
			$homeModel = new HomeModel();

			$user_id = $_SESSION['user_id'];
			$homeModel = new HomeModel();
			$person = $homeModel->getPerson($link,$user_id);
			$feed = $homeModel->getFeed($link,$user_id);

			include "Views/Home/index.php";
		}
	}

?>