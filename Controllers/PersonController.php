<?php
	include "Models\\PersonModel.php";
	include "Models\\FilesModel.php";
	include "Models\\SubjectModel.php";
	include "Models\\SchoolModel.php";
	include "Models\\HomeModel.php";

	class PersonController {

		public static function index($link) {
			$model = new PersonModel();

			$posts = $model->getPosts($link, $_GET['param2']);

			foreach ($posts as $key => $post) {
				$names = explode(";", $post['names']);
				$posts[$key]['tags'] = $names;
				if(!$names[0]){
					$posts[$key]['tags'] = [];
				}
			} 

			$user_id = $_SESSION['user_id'];

			$homeModel = new HomeModel();
			$interests = $homeModel->getInterestsWithNames($link, $user_id);

			$schoolModel = new SchoolModel();
			$schools = $schoolModel->getAllSchools($link);

			$subjectModel = new SubjectModel();
			$subjects = $subjectModel->getAllSubjects($link);

			$person = $homeModel->getPerson($link, $_GET['param2']); 

			// print_r($person); die;

			include "Views/Person/index.php";
		}
	}

?>