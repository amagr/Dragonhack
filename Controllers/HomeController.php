<?php
	include "Models\\HomeModel.php";

	class HomeController {

		private $link;
		function __construct($link) {
			$this->link = $link;
		}

		public static function index() {
			$homeModel = new HomeModel();

			$person = $homeModel->getPerson();

			include "Views/Home/index.php";
		}
	}

?>