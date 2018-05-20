<?php 
	class PersonModel {
		public function getPosts($link, $id_person) {
			// $sql = "SELECT * FROM file_post where id_person = ".$id_person;

			// $posts = mysqli_query($link, $sql);

			// return $posts;

			$where = "AND FP.id_person=".$id_person;
			

			$sql = "SELECT FP.*, DATE_FORMAT(FP.date, '%d.%m.%Y') as date_parsed, P.nickname, S.name as subject_name,SO.name as school_name,
			(
			SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post LIMIT 1
			) as like_count,
			(SELECT GROUP_CONCAT(CONCAT(name_tag) SEPARATOR ';') as points FROM tag_on_files WHERE id_file_post = FP.id_file_post) as names,
			(SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post AND id_person = ".$_SESSION['user_id']." LIMIT 1) as is_like
			FROM file_post FP
			JOIN person P on (FP.id_person = P.id_person)
			LEFT JOIN subject S on (FP.id_subject = S.id_subject)
			LEFT JOIN school SO on (FP.id_school = SO.id_school)
			WHERE 1=1  ".$where."
			order by FP.date DESC";
			//echo $sql; die;
		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
		public function addToFavorite($link, $id_person_following,$id_person_followed) {

			$sql = "INSERT INTO `following`
				(
				`id_person_following`,
				`id_person_followed`)
				VALUES
				(".$id_person_following.",
				".$id_person_followed.")";
				mysqli_query($link, $sql);
				
		}

	}
?>