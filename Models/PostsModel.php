<?php 
	class PostsModel {
		public function sort_posts($link,$user_id) {
			$year = $_POST['year'];
			$tags = $_POST['tags'];
			$subject = $_POST['subject'];
			$school = $_POST['school'];
			$where = '';
			if($year){
				$where .= "AND FP.year = ".$year." ";
			}
			if($subject){
				$where .= "AND FP.subject = ".$subject." ";
			}
			if($school){
				$where .= "AND FP.school = ".$school." ";
			}
			$sql = "SELECT FP.*, DATE_FORMAT(FP.date, '%d.%m.%Y') as date_parsed, P.nickname,
			(
			SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post LIMIT 1
			) as like_count,
			(SELECT GROUP_CONCAT(CONCAT(name_tag) SEPARATOR ';') as points FROM tag_on_files WHERE id_file_post = FP.id_file_post) as names,
			(SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post AND id_person = ".$user_id." LIMIT 1) as is_like
			FROM file_post FP
			JOIN person P on (FP.id_person = P.id_person)
			WHERE 1=1  ".$where."
			order by FP.date DESC";

		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
	}
?>