<?php

	include "Models\\LogInModel.php";
	class AjaxController {

		public static function common_ajax($link) {
			$action = $_POST['action'];
			if($action = 'get-programs-by-school'){
				$model = new LogInModel();
				$programs = $model->_get_programs($link,intval($_POST['school_id']));
				    echo json_encode([
			        'status' => 1,
			        'obj' => $programs
			    ]);
			}
		}
	}

?>