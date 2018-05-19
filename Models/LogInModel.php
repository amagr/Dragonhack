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
		public function insert_new_user($link) {
			
			$username = $_POST['username'];
			$e_mail = $_POST['e-mail'];
			$password = md5($_POST['password']);
			$school = $_POST['school'];
			$year = $_POST['year'];
			$smer = $_POST['smer'];

			$sql_program = "SELECT id_program FROM program
			WHERE id_school=".$school." AND year =".$year." AND smer = '".$smer. "' LIMIT 1";
			$program_sql = mysqli_query($link,$sql_program);
			$id_program = (mysqli_fetch_assoc($program_sql)['id_program']);
			
			$sql = "INSERT INTO `person`
				(
				`nickname`,
				`e-mail`,
				`password`,
				`id_program`)
				VALUES
				('".$username."',
				'".$e_mail."',
				'".$password."',
				".$id_program.")";
			mysqli_query($link,$sql);

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
		public function _get_programs($link,$id_school) {
		    $sql ="SELECT * FROM program WHERE id_school = ".$id_school.";";
		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
			return $rez;
		}
	}
?>