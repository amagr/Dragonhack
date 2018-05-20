<?php 
	class PostsModel {
		public function getSchools($link) {
	
			$sql = "SELECT distinct * FROM school";

		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
		public function getSubjects($link) {
			$sql = "SELECT distinct * FROM subject";

		    $sql_query = mysqli_query($link,$sql);
	        $rez = array();
	        while($row = mysqli_fetch_assoc($sql_query)){
	            $rez[] = $row;
	        }
	        return $rez;
		}
		public function sort_posts($link,$user_id) {
			$year = $_POST['year'];
			$tag = $_POST['tags'];
			$subject = $_POST['subject'];
			$school = $_POST['school'];
			$where = '';
			if($year){
				$where .= "AND FP.year = ".$year." ";
			}
			if($subject){
				$where .= "AND FP.id_subject = ".$subject." ";
			}
			if($school){
				$where .= "AND FP.id_school = ".$school." ";
			}
			if($tag){
				$where .= " AND TOF.name_tag  LIKE '".$tag."' ";
			}
			$sql = "SELECT distinct FP.*, DATE_FORMAT(FP.date, '%d.%m.%Y') as date_parsed, P.nickname, S.name as subject_name,SO.name as school_name,
			(
			SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post LIMIT 1
			) as like_count,
			(SELECT GROUP_CONCAT(CONCAT(name_tag) SEPARATOR ';') as points FROM tag_on_files WHERE id_file_post = FP.id_file_post) as names,
			(SELECT count(*) from like_logs WHERE id_post_file = FP.id_file_post AND id_person = ".$user_id." LIMIT 1) as is_like
			FROM file_post FP
			JOIN person P on (FP.id_person = P.id_person)
			LEFT JOIN subject S on (FP.id_subject = S.id_subject)
			LEFT JOIN school SO on (FP.id_school = SO.id_school)
			LEFT JOIN tag_on_files TOF ON (FP.id_file_post = TOF.id_file_post)
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
	}
?>