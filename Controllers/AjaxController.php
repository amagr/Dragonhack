<?php

	include "Models\\LogInModel.php";
	include "Models\\HomeModel.php";
	include "Models\\PostsModel.php";
	include "Models\\TagsModel.php";

	class AjaxController {

		public static function common_ajax($link) {
			$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : -1;
			$action = isset($_POST['action']) ? $_POST['action'] : '';
			if($action == 'get-programs-by-school'){
				$model = new LogInModel();
				$programs = $model->_get_programs($link,intval($_POST['school_id']));
			    echo json_encode([
			        'status' => 1,
			        'obj' => $programs
			    ]);
			} else if($action == 'add-like'){
			   
				$model = new HomeModel();
				$model->add_like($link);

				echo json_encode([
			        'status' => 1,
			        'obj' => ''
			    ]);

			} else if($action == 'get-tags'){
			   
				$model = new TagsModel();
				$tags = $model->getTags($link, $_POST['term']);

				echo json_encode([
			        'status' => 1,
			        'obj' => $tags
			    ]);

			} else if($action == 'add-tag'){
			   
				$model = new TagsModel();
				$model->addTag($link, $_POST['tag']);

			} else if ($action == 'sort-posts') {
				$model = new PostsModel();
				$feed = $model->sort_posts($link,$user_id);
				foreach ($feed as $key => $post) {
					$names = explode(";", $post['names']);
					$feed[$key]['tags'] = $names;
					if(!$names[0]){
						$feed[$key]['tags'] = [];
					}
				} 
			    echo json_encode([
			        'status' => 1,
			        'obj' => $feed
			    ]);
			}
		}
	}

?>