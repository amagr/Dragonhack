<?php 
	class SubjectModel {
		public function getAllSubjects($link) {
			$sql = mysqli_query($link, "SELECT * FROM subject");
			return $sql;
		}
	}
?>