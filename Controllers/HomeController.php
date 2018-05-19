<?php
	include "Models\\HomeModel.php";

	class HomeController {


		public static function index($link) {
			$homeModel = new HomeModel();

			$user_id = $_SESSION['user_id'];
			$homeModel = new HomeModel();
			$person = $homeModel->getPerson($link,$user_id);
			$feed = $homeModel->getFeed($link,$user_id);
			foreach ($feed as $key => $post) {
				$names = explode(";", $post['names']);
				$feed[$key]['tags'] = $names;
				if(!$names[0]){
					$feed[$key]['tags'] = [];
				}
			} 
			include "Views/Home/index.php";
		}
	}

?>