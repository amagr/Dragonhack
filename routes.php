<?php

	spl_autoload_register(function ($class_name) {
	    include 'Controllers\\' .$class_name . '.php';
	});

	if(!isset($_SESSION["user_id"])) {
		if (!isset($_GET["param1"]) || (isset($_GET["param1"]) && $_GET["param1"] == "")) {
			if(isset($_POST["login"])) {
				LogInController::login($link);
			} else {
				LogInController::index();
			}
		} else if(isset($_GET["param1"]) && ($_GET["param1"] == "register")) {
				LogInController::registration($link);
		}
	} else {
		if (isset($_GET["param1"])) {
			if ($_GET["param1"] == "home") {
				HomeController::index();
			} else if ($_GET["param1"] == "person") {
				PersonController::index();
			}  else if ($_GET["param1"] == "logout") {
				LogInController::logout();
			} else {
				echo "wrong url";
			}

			if (isset($_GET["param2"])) {
				echo $_GET["param2"];
			}

		} else {
			echo "no params";
		}
	}
?>