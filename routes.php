<?php

	spl_autoload_register(function ($class_name) {
	    include 'Controllers\\' .$class_name . '.php';
	});

	if (isset($_GET["param1"])) {
		if ($_GET["param1"] == "home") {
			HomeController::index();
		} else if ($_GET["param1"] == "person") {
			PersonController::index();
		} else {
			echo "wrong url";
		}

		if (isset($_GET["param2"])) {
			echo $_GET["param2"];
		}

	} else {
		echo "no params";
	}
?>