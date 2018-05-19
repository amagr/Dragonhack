<?php
	include "Models\\FilesModel.php";
	include "Models\\LogInModel.php";
	include "Models\\ProgramModel.php";
	include "Models\\SubjectModel.php";
	include "Models\\SchoolModel.php";

	class FilesController {

		public static function index() {
			include "Views/Files/index.php";
		}

		public static function uploadFiles($link) {
			$schoolModel = new SchoolModel();
			$schools = $schoolModel->getAllSchools($link);

			$subjectModel = new SubjectModel();
			$subjects = $subjectModel->getAllSubjects($link);

			include "Views/Files/uploadFiles.php";
		}

		public static function upload($link) {
			$model = new FilesModel();
			$model->upload($link);
		}
	}

?>