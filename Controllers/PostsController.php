<?php
	include "Models\\PostsModel.php";
	include "Models\\HomeModel.php";
	include "Models\\FilesModel.php";
	include "Models\\SubjectModel.php";
	include "Models\\SchoolModel.php";

	class PostsController {

		public static function index($link) {
			$model = new PostsModel;
			$user_id = $_SESSION['user_id'];
			$schools = $model->getSchools($link);
			$subjects = $model->getsubjects($link);

			$homeModel = new HomeModel();
			$interests = $homeModel->getInterestsWithNames($link, $user_id);

			$schoolModel = new SchoolModel();
			$schools = $schoolModel->getAllSchools($link);

			$subjectModel = new SubjectModel();
			$subjects = $subjectModel->getAllSubjects($link);
			$tags = $homeModel->getPopularTags($link);
			if(!isset($_GET["param2"])){
				$json = 0;
			} else {
				$json = $_GET["param2"];
			}

			include "Views/Posts/index.php";
		}
	}

?>