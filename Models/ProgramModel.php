<?php 
	class ProgramModel {
		public function getAllPrograms($link) {
			$sql = mysqli_query($link, "SELECT * FROM program");
			return $sql;
		}
	}
?>