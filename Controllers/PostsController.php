<?php
	//include "Models\\PoststModel.php";

	class PostsController {

		public static function index() {
			$user_id = $_SESSION['user_id'];
			if(!isset($_GET["param2"])){
				$json = 0;
			} else {
				$json = $_GET["param2"];
			}
			include "Views/Posts/index.php";
		}

		public static function uploadFiles() {
			include "Views/Files/uploadFiles.php";
		}

		public static function upload($link) {
			$model = new FilesModel();
			$model->upload($link);
		}
	}

?>