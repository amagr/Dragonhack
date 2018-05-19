<?php 
	class HomeModel {
		public function getPerson($link,$id_person) {

			$sql = "SELECT P.*, Pr.*, S.* FROM person P
				JOIN program Pr ON (P.id_program = Pr.id_program)
				JOIN school S ON (Pr.id_school = S.id_school)
				WHERE id_person = ".$id_person;
			$sql_query = mysqli_query($link,$sql);
			$person_data = mysqli_fetch_assoc($sql_query);
						print_r($person_data); die;

			return $person_data;
		}
		public function getFeed() {
			return "Miha Zadravec";
		}
	}
?>