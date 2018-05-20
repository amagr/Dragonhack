<?php
	include "Models\\PostsModel.php";

	class PostsController {

		public static function index($link) {
			$model = new PostsModel;
			$user_id = $_SESSION['user_id'];
			$schools = $model->getSchools($link);
			$subjects = $model->getsubjects($link);

			if(!isset($_GET["param2"])){
				$json = 0;
			} else {
				$json = $_GET["param2"];
			}

			include "Views/Posts/index.php";
		}
	}

?>