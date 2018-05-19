<?php 
	class LogInModel {
		public function login($link) {
			$sql = mysqli_query($link, "SELECT id_person, nickname, password, is_admin FROM person WHERE nickname = '".$_POST	["username"]."' AND password like '".md5($_POST["password"])."'");
			if($sql){
				if ($row = mysqli_fetch_assoc($sql)) {
					$_SESSION['user_id']=$row["id_person"];
					$_SESSION['user_nickname']=$row["nickname"];
					$_SESSION['user_is_admin']=$row["is_admin"];
				}
			}
		}
		public function register($link) {
			$sql = mysqli_query($link, "SELECT id_person, nickname, password, is_admin FROM person WHERE nickname = '".$_POST	["username"]."' AND password like '".md5($_POST["password"])."'");
			
			if($sql){
				if ($row = mysqli_fetch_assoc($sql)) {
					$_SESSION['user_id']=$row["id_person"];
					$_SESSION['user_nickname']=$row["nickname"];
					$_SESSION['user_is_admin']=$row["is_admin"];
				}
			}
		}
		public function getAllSchools($link) {
			$sql = mysqli_query($link, "SELECT * FROM school");
			return $sql;
		}
		public function logOut() {
			unset($_SESSION['user_id']);
			unset($_SESSION['user_nickname']);
			unset($_SESSION['user_is_admin']);
		}
	}
?>