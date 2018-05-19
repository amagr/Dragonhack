<?php
	include "Models\\FilesModel.php";

	class FilesController {

		public static function index() {
			include "Views/Files/index.php";
		}

		public static function uploadFiles() {
			include "Views/Files/uploadFiles.php";
		}
	}

?>