<?php
	include "Models\\HomeModel.php";
	include "Models\\FilesModel.php";
	include "Models\\SubjectModel.php";
	include "Models\\SchoolModel.php";

	class HomeController {


		public static function index($link) {
			$homeModel = new HomeModel();
			$user_id = $_SESSION['user_id'];
			$homeModel = new HomeModel();
			$person = $homeModel->getPerson($link, $user_id);
			$interest = $homeModel->getInterest($link, $user_id);
			$term = 0;
			if(isset($_GET["param2"])){
				$term = $_GET["param2"];
			}

			$feed = $homeModel->getFeed($link, $user_id,$interest,$term);

			$interests = $homeModel->getInterestsWithNames($link, $user_id);

			$schoolModel = new SchoolModel();
			$schools = $schoolModel->getAllSchools($link);

			$subjectModel = new SubjectModel();
			$subjects = $subjectModel->getAllSubjects($link);
			$tags = $homeModel->getPopularTags($link);
			// print_r($interests);die;

			foreach ($feed as $key => $post) {
				$names = explode(";", $post['names']);
				$feed[$key]['tags'] = $names;
				if(!$names[0]){
					$feed[$key]['tags'] = [];
				}
			} 
			include "Views/Home/index.php";
		}

		public static function changeInterest($link) {
			$homeModel = new HomeModel();
			$homeModel->changeInterest($link);

			header("Location: /"); 
		}
	}

?>