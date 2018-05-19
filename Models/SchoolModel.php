<?php 
	class SchoolModel {
		public function getAllSchools($link) {
			$sql = mysqli_query($link, "SELECT * FROM school");
			return $sql;
		}
	}
?>