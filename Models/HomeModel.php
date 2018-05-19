<?php 
	class HomeModel {
		public function getPerson($link,$id_person) {

			$sql = "SELECT P.*, Pr.*, S.* FROM person P
				JOIN program Pr ON (P.id_program = Pr.id_program)
				JOIN school S ON (Pr.id_school = S.id_school)
				WHERE id_person = ".$id_person;
			$sql_query = mysqli_query($link,$sql);
			$person_data = mysqli_fetch_assoc($sql_query);
			return $person_data;
		}
		public function getFeed($link,$user_id) {
			$where = '';
			$sql = "SELECT FP.*, DATE_FORMAT(FP.date, '%d.%m.%Y') as date_parsed, P.nickname,
			(
			SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post LIMIT 1
			) as like_count,
			(SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post AND id_person = ".$user_id." LIMIT 1) as is_like
			FROM file_post FP
			JOIN person P on (FP.id_person = P.id_person)
			order by FP.date DESC;";
		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
		public function add_like($link){
		  
		    $id_person = intval($_POST['id_person']);
			$id_post_file = intval($_POST['id_post_file']);
			
			$sql = "INSERT INTO `like_logs`
				(
				`id_person`,
				`id_post_file`)
				VALUES
				(".$id_person.",
				".$id_post_file.")";
			mysqli_query($link,$sql);
		}
	}
?>