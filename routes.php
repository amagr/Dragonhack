<?php

	spl_autoload_register(function ($class_name) {
	    include 'Controllers\\' .$class_name . '.php';
	});
	if(isset($_GET["param1"]) && $_GET["param1"] == "common-ajax"){
		AjaxController::common_ajax($link);
		die;
	} 
	if(!isset($_SESSION["user_id"])) {
		if (!isset($_GET["param1"]) || (isset($_GET["param1"]) && $_GET["param1"] == "")) {
			if(isset($_POST["login"])) {
				LogInController::login($link);
			} 
			else {
				LogInController::index();
			}

		} else if(isset($_GET["param1"]) && ($_GET["param1"] == "register") && (!isset($_POST["register"]))) {
				LogInController::registration($link);
		}  elseif (isset($_GET["param1"]) && ($_GET["param1"] == "register") && (isset($_POST["register"]))) {
			LogInController::registration_post($link);
		}
	} else {
		if (isset($_GET["param1"])) {
			if ($_GET["param1"] == "home") {
				HomeController::index($link);
			} else if ($_GET["param1"] == "files") {
				if ($_GET["param2"] == "upload") {
					FilesController::uploadFiles();
				} else {	
					FilesController::index();
				}
			} else if ($_GET["param1"] == "file-upload") {
				FilesController::upload($link);
			} else if ($_GET["param1"] == "logout") {
				LogInController::logout();
			}
			else {
				echo "wrong url";
			}

		} else {
			echo "no params";
		}
	}
?>